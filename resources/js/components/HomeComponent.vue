<template>
  <div class="home_wrapper">
    <video v-if="!isVisibleRestaurants" autoplay muted loop id="HomeVideo">
      <source src="img/video.mp4" type="video/mp4" />
    </video>

    <!-- RICERCA DEL RISTORANTE -->
    <div v-if="!isVisibleRestaurants" class="search_center">
        <div class="search_container">
            <!-- visualizza tutti i ristoranti HOME PAGE -->
            <div v-if="!isVisibleRestaurants" class="search_restaurants text-center"  >
                <span @click="(isVisibleRestaurants = true),  filterCategory('all'), callRestaurants() " class="bttn px-4 py-2 m-2">Visualizza tutti i Ristoranti</span>
                <h4 class="mt-5">Oppure seleziona una categoria per iniziare</h4>
            </div>

            <div class="search_div">
                <!-- visualizza tutti i ristoranti RISTORANTI VISIBILI -->
                <div v-if="isVisibleRestaurants" @click=" (isVisibleRestaurants = true), filterCategory('all'), callRestaurants() " class="px-4 py-2 m-2" :class="categories_array.includes('all') ? 'bttn' : 'bttn_reverse'" >
                  Visualizza tutti i Ristoranti
                </div>

                <!-- LISTA DELLE CATEGORIE -->
                <div class="px-4 py-2 m-2" :class=" categories_array.includes(category.name) ? 'bttn' : 'bttn_reverse' "  @click=" (isVisibleRestaurants = true), filterCategory(category.name), callRestaurants()" v-for="category in categories" :key="category.name" >
                  {{ category.name }}
                </div>
            </div>
        </div>
    </div>

    <!-- categorie (ristoranti visibili) -->
    <div v-else class="sticky">
        <div @click="showCategoriesMobile()" class="bttn show_categories">{{ visibleCatMobile ? 'Nascondi Categorie' : 'Visualizza Categorie' }}</div>
        <div class="search_div" :class=" visibleCatMobile ? 'activeCategoriesMobile' : 'disableCategoriesMobile' ">
            <!-- visualizza tutti i ristoranti RISTORANTI VISIBILI -->
            <div @click=" (isVisibleRestaurants = true), filterCategory('all'), callRestaurants() " class="px-4 py-2 m-2" :class="categories_array.includes('all') ? 'bttn' : 'bttn_reverse'" >
              Visualizza tutti i Ristoranti
            </div>

            <!-- LISTA DELLE CATEGORIE -->
            <div class="px-4 py-2 m-2" :class=" categories_array.includes(category.name) ? 'bttn' : 'bttn_reverse' "  @click=" (isVisibleRestaurants = true), filterCategory(category.name), callRestaurants()" v-for="category in categories" :key="category.name" >
              {{ category.name }}
            </div>
        </div>
    </div>

    <!-- RISTORANTI VISUALIZZATI DOPO LA RICERCA -->
    <div class="restaurants my_container" v-if="isVisibleRestaurants">
      <!-- messaggio ristorante non trovato con il filtro di categoria -->
      <h4 class="bg-white mt-5 p-4 mx-auto shadow" v-if="(restaurants == '')">
        Nessun ristorante da visualizzare per questa categoria 😪
      </h4>

      <!-- ristorante visualizzato -->
      <router-link v-for="restaurant in restaurants" :key="restaurant.id" class="my_card" :to="{ name: 'restaurants.show', params: { id: restaurant.id } }" @click="selectedRestaurant = restaurant.id">
          <img :src=" restaurant.image == null  ? 'img/cover_restaurant.jpg' : 'storage/' + restaurant.image" alt="" />
          <span class="details">{{ restaurant.name }}</span>
      </router-link>

    </div>

    <!-- BOTTONE MOSTRA ALTRI -->
    <div class="show_more_restaurants text-center" v-if="isVisibleRestaurants && restaurants != '' ">
      <h3 @click="addRestaurants()" class="btn btn-info">Mostra altri risultati...</h3>
    </div>

  </div>
</template>

<script>
import Axios from "axios";

export default {
  data() {
    return {
      restaurants: [],
      categories: [],
      filterRestaurants: [],
      isVisibleRestaurants: false,
      selectedRestaurant: "",
      categories_array: [],
      visibleCatMobile: false,
      counterPagination: 4,
    }
  },
  methods: {
    addRestaurants(){
      this.counterPagination += 4;
      this.callRestaurants();
    },
    showCategoriesMobile(){
      if (this.visibleCatMobile) {
          this.visibleCatMobile = false;
      } else {
        this.visibleCatMobile = true;
      }
    },
    filterCategory(name) {
      // console.log(name);
      this.counterPagination = 4; //reset paginazione
      if (name === "all") {
        this.categories_array = [];
        this.categories_array.push("all");
      }
      // console.log(this.categories_array.includes(name));
      if (this.categories_array.includes(name)) {
        // console.log(this.categories_array.indexOf(name));
        let index_name = this.categories_array.indexOf(name);
        this.categories_array.splice(index_name, 1);
        // this.categories_array.splice((indexOF(name), 1));
      } else {
        if (this.categories_array.includes("all")) {
          this.categories_array.splice(this.categories_array.indexOf("all"), 1);
        }
        if (this.categories_array.includes(name)) {
          let index_name = this.categories_array.indexOf(name);
          this.categories_array.splice(index_name, 1);
        } else {
          this.categories_array.push(name);
        }
      }
      // console.log(this.categories_array);
      if (this.categories_array.length == 0) {
        this.categories_array.push("all");
      }
      // console.log(this.categories_array);
    },
    callRestaurants() {
      let string_categories = this.categories_array.toString();
      Axios.get(
        "http://127.0.0.1:8000/api/restaurants?categories=" + string_categories
      )
        .then((resp) => {
          // this.restaurants = resp.data.data;
          // this.restaurants.slice(0, this.counterPagination)
          const restData = resp.data.data;
          if (restData) {
            this.restaurants = restData.slice(0, this.counterPagination);
          }
        })
        .catch((e) => {
          console.error(e);
        });
    },
    callCategories() {
      Axios.get("./api/categories")
        .then((resp) => {
          this.categories = resp.data.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
  },
  mounted() {
    this.callRestaurants();
    this.callCategories();
  },
  
}
</script>

<style lang="scss" scoped>
#HomeVideo {
  position: absolute;
  width: 100%;
  // height: calc(100vh - 48.73px);
  height: 100vh;
  min-height: 300px;
  object-fit: cover;
  z-index: -999;
  filter: brightness(50%);
}

.search_restaurants,
.search_div {
  padding: 1rem;
  background-color: white;
}

.search_center {
  overflow: auto;
  min-height: 100vh;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;

  .search_container{
    @media screen and (min-width: 575.99px) {
      width: 80%;
    }
    @media screen and (max-width: 575.98px) {
      position: sticky;
      top: 0;
      height: 100%;
      width: 100%;
    }
  }
}

.search_div {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;

  @media screen and (max-width: 575.98px) {
    display: flex;
    flex-direction: column;

    .show_categories{
      display: flex;
    }
  }
}

.show_categories{
    display: none;

    @media screen and (max-width: 575.98px) {
    display: flex;
    flex-direction: column;

    .show_categories{
      display: flex;
    }
  }
}
.activeCategoriesMobile {
  display: flex;
}
.disableCategoriesMobile{
  display: none;

  @media screen and (min-width: 575.98px) {
    display: flex;
  }
}

.sticky {
  position: sticky;
  top: 0;
  z-index: 999;
  animation: slide_up 0.5s ease;
  box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.13);
}

// ANIMAZIONE CATEGORIE
@keyframes slide_up {
  from {
    position: absolute;
    top: 400px;
    opacity: 0;
  }
  to {
    position: sticky;
    top: 0;
    opacity: 1;
  }
}

.restaurants {
  animation: show 0.5s 0.5s ease;
  animation-fill-mode: backwards;
  display: flex;
  flex-wrap: wrap;
  // min-height: 55vh;

  .my_card {
    width: calc(100% / 4 - 2rem);
    border-radius: .5rem;
    margin: 1rem;
    overflow: hidden;
    height: 16rem;
    background-color: white;
    border: 1px solid rgb(238, 238, 238);
    text-decoration: none;
    transition: 0.2s ease;

    @media screen and (max-width: 1399.98px) {
      width: calc(100% / 3 - 2rem);
    }
    @media screen and (max-width: 991.98px) {
      width: calc(100% / 3 - 2rem);
    }
    @media screen and (max-width: 767.98px) {
      width: calc(100% / 2 - 2rem);
    }
    @media screen and (max-width: 575.98px) {
      width: calc(100% - 2rem);
    }

    display: flex;
    flex-direction: column;
    justify-content: space-between;

    img {
      height: 75%;
      width: 100%;
      object-fit: cover;
    }

    .details {
      height: 25%;
      padding: 1rem;
      font-size: 1.1rem;
    }


    &:hover {
      transform: translatey(-5px);
      box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.336);
      color: inherit;
    }
  }
}
.show_more_restaurants{
  animation: show 0.5s 0.5s ease;
  animation-fill-mode: backwards;
  margin-top: 3rem;
  margin-bottom: 3rem;
}

// ANIMAZIONE RISTORANTI
@keyframes show {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
</style>