<template>
  <div class="home_wrapper">
    <div class="box_video">
      <video v-if="!isVisibleRestaurants" autoplay muted loop id="HomeVideo">
        <source src="img/video.mp4" type="video/mp4" />
      </video>
    </div>

    <!-- RICERCA DEL RISTORANTE -->
    <div class="box_ricerca">
      <div :class="isVisibleRestaurants ? 'sticky' : 'search_center'">
        <div
          v-if="!isVisibleRestaurants"
          class="search_restaurants text-center"
        >
          <span
            @click="
              (isVisibleRestaurants = true),
                filterCategory('all'),
                callRestaurants()
            "
            class="bttn px-4 py-2 m-2"
          >
            Visualizza tutti i Ristoranti
          </span>
          <h4 class="mt-5">Oppure seleziona una categoria per iniziare</h4>
        </div>

        <div class="search_div">
          <div
            v-if="isVisibleRestaurants"
            @click="
              (isVisibleRestaurants = true),
                filterCategory('all'),
                callRestaurants()
            "
            class="px-4 py-2 m-2"
            :class="categories_array.includes('all') ? 'bttn' : 'bttn_reverse'"
          >
            Visualizza tutti i Ristoranti
          </div>

          <div
            class="px-4 py-2 m-2"
            :class="
              categories_array.includes(category.name) ? 'bttn' : 'bttn_reverse'
            "
            @click="
              (isVisibleRestaurants = true),
                filterCategory(category.name),
                callRestaurants()
            "
            v-for="category in categories"
            :key="category.name"
          >
            {{ category.name }}
          </div>
        </div>
      </div>
    </div>

    <!-- RISTORANTI VISUALIZZATI DOPO LA RICERCA -->
    <div class="restaurants" v-if="isVisibleRestaurants">
      <!-- messaggio ristorante non trovato con il filtro di categoria -->
      <h4 class="bg-white mt-5 mx-auto" v-if="!(restaurants.length != 0)">
        Nessun ristorante da visualizzare per questa categoria 😪
      </h4>

      <!-- ristorante visualizzato -->
      <router-link
        v-for="restaurant in restaurants"
        :key="restaurant.id"
        class="my_card"
        :to="{ name: 'restaurants.show', params: { id: restaurant.id } }"
        @click="selectedRestaurant = restaurant.id"
      >
        <div class="content">
          <img
            :src="
              restaurant.image == null
                ? 'img/cover_restaurant.jpg'
                : 'storage/' + restaurant.image
            "
            alt=""
          />

          <div class="details">
            <h5>{{ restaurant.name }}</h5>
          </div>
        </div>
      </router-link>
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
    };
  },
  methods: {
    filterCategory(name) {
      console.log(this.categories_array.includes(name));
      if (this.categories_array.includes(name)) {
        console.log(this.categories_array.indexOf(name));
        let index_name = this.categories_array.indexOf(name);
        this.categories_array.splice(index_name, 1);
        // this.categories_array.splice((indexOF(name), 1));
      } else {
        this.categories_array.push(name);
      }
      console.log(this.categories_array);
    },

    callRestaurants() {
      let string_categories = this.categories_array.toString();
      Axios.get(
        "http://127.0.0.1:8000/api/restaurants?categories=" + string_categories
      )
        .then((resp) => {
          this.restaurants = resp.data;
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
};
</script>

<style lang="scss" scoped>
#HomeVideo {
  position: fixed;
  width: 100%;
  height: 100vh;
  object-fit: cover;
  z-index: -999;
  filter: brightness(50%);
}

.search_restaurants,
.search_div {
  padding: 1rem;
  background-color: white;
}

.search_div {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;

  @media screen and (max-width: 575.98px) {
    display: flex;
    flex-direction: column;
  }
}

.box_ricerca {
  display: flex;
  justify-content: center;
}

.search_center {
  /*   width: 60%;
  position: fixed;
  top: 50%;
  left: 50%; */
  transform: translateY(50%);
  transition: 1s;
  @media screen and (max-width: 1199.98px) {
    width: 70%;
  }
  @media screen and (max-width: 991.98px) {
    width: 75%;
  }
  @media screen and (max-width: 767.98px) {
    width: 80%;
  }
  @media screen and (max-width: 575.98px) {
    width: 90%;
    margin: -55%;
  }
}

.sticky {
  position: sticky;
  top: 0;
  z-index: 999;
  animation: slide_up 0.5s ease;
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
  width: 80%;
  @media screen and (max-width: 991.98px) {
    width: 98%;
  }
  margin: auto;
  animation: show 0.5s 0.5s ease;
  animation-fill-mode: backwards;
  display: flex;
  flex-wrap: wrap;

  .my_card {
    width: calc(100% / 4 - 2rem);
    margin: 1rem;
    @media screen and (max-width: 1199.98px) {
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
    background-color: rgb(240, 240, 240);
    text-decoration: none;
    transition: 0.2s ease;

    img {
      width: 100%;
    }

    .details {
      padding: 1rem;
    }

    &:hover {
      transform: translatey(-5px);
      box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.336);
      color: inherit;
    }
  }
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