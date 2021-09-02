<template>
<div class="home_wrapper">
    <video v-if="!isVisibleRestaurants" autoplay muted loop id="HomeVideo">
        <source src="img/video.mp4" type="video/mp4">
    </video>

    <!-- RICERCA DEL RISTORANTE -->
    <div :class=" isVisibleRestaurants ? 'sticky' : 'search_center' ">
        <div v-if="!isVisibleRestaurants" class="search_restaurants text-center">
            <h1>Ordina su DeliveBoo!</h1>
            <span @click="isVisibleRestaurants = true, selectedCategory = [] " class="bttn px-4 py-2 m-2">Visualizza tutti i Ristoranti</span>
            <h4 class="mt-5">Oppure seleziona una categoria per iniziare</h4>
        </div>
        
        <div class="search_div d-flex flex-wrap justify-content-center">
            <!-- <form action="#" method="post" novalidate="novalidate">
                <div class="search_form d-flex align-items-center justify-content-center">
                    <div>
                        <input type="text" class="form-control search-slt" placeholder="Città / CAP">
                    </div>
                    <div>
                        <input type="text" class="form-control search-slt" placeholder="Ristorante">
                    </div>
                    <div>
                        <select class="form-control search-slt" id="Selector1">
                            <option selected>Seleziona</option>
                            <option value="" v-for="category in categories" :key='category.id'> {{category.name}} </option>

                        </select>
                    </div>
                    <div>
                        <button @click="isVisibleRestaurants = true" type="button" class="bttn">Cerca</button>
                    </div>
                </div>
            </form> -->
            <div v-if="isVisibleRestaurants" 
                @click="isVisibleRestaurants = true, selectedCategory = [] " 
                class="px-4 py-2 m-2"
                :class="selectedCategory == [] ? 'bttn' : 'bttn_reverse' ">
                Visualizza tutti i Ristoranti
            </div>

            <div class="px-4 py-2 m-2" 
                :class="selectedCategory == category.id ? 'bttn' : 'bttn_reverse' "
                @click="isVisibleRestaurants = true, selectedCategory.push(category.id)" 
                v-for="category in categories" :key='category.id'>
                {{category.name}}
            </div>
        </div>
    </div>

    <!-- RISTORANTI VISUALIZZATI DOPO LA RICERCA -->
    <div class="restaurants p-5" v-if="isVisibleRestaurants">
        <a :href="'./restaurants/' + selectedRestaurant " @click="selectedRestaurant = restaurant.id" class="my_card" v-for="restaurant in restaurants" :key='restaurant.id'>
            <div v-if="activeCategory(restaurant.categories)">
                <img  :src="restaurant.image" alt="">
                <div class="details">
                    <h3> {{restaurant.name}} </h3>
                    <h3> {{restaurant.categories[0].id}} </h3>
                </div>
            </div>
                {{restaurant.categories}}
        </a>
    </div>
</div>
</template>

<script>
import Axios from 'axios';

export default {
    data() {
        return{
            restaurants: '',
            categories: '',
            isVisibleRestaurants: false,
            selectedCategory: [],
            selectedRestaurant: '',
        }
    },
    methods: {
        activeCategory(restaurant){
            restaurant.forEach(category => {
                if (this.selectedCategory.includes(category.id)) {
                    return true;
                }else {
                    return false;
                }
            });

        },
        callRestaurants(){
            Axios.get('./api/restaurants')
            .then(resp => {
                this.restaurants = resp.data.data;
            })
            .catch(e => {
                console.error(e);
            })
        },
        callCategories(){
            Axios.get('./api/categories')
            .then(resp => {
                this.categories = resp.data.data;
            })
            .catch(e => {
                console.error(e);
            })
        },
    },
    mounted(){
        this.callRestaurants();
        this.callCategories();
    }

}
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

.search_restaurants, .search_div {
    padding: 1rem;
    background-color: white;
}

.search_center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transition: 1s;
}

.sticky {
    position: sticky;
    top: 0;
    z-index: 999;
    animation: slide_up .5s ease;
}

// ANIMAZIONE CATEGORIE
@keyframes slide_up {
    from{
        position: absolute;
        top: 400px;
        opacity: 0;
    }
    to{
        position: sticky;
        top: 0;
        opacity: 1;
    }
}

.restaurants {
    width: 80%;
    @media screen and (max-width:991.98px) {
        width: 98%;
    }

    margin: auto;
    animation: show .5s .5s ease;
    animation-fill-mode: backwards;
    display: flex;
    flex-wrap: wrap;
    // display: grid;
    // place-items: center;
    // grid-template-columns: 1fr 1fr 1fr; 
    .my_card {
        width: calc(100% / 4 - 2rem);
        margin: 1rem;
        @media screen and (max-width:1199.98px) {
            width: calc(100% / 3 - 2rem);
        }
        @media screen and (max-width:991.98px) {
            width: calc(100% / 3 - 2rem);
        }
        @media screen and (max-width:767.98px) {
            width: calc(100% / 2 - 2rem);
        }
        @media screen and (max-width:575.98px) {
            width: calc(100% - 2rem);
        }

        background-color: rgb(240, 240, 240);
        text-decoration: none;
        transition: .2s ease;

        img {
            width: 100%;
        }

        .details {
            padding: 1rem;
        }

        &:hover{
            transform: translatey(-5px);
            box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.336);
            color: inherit;
        }
    }
}

// ANIMAZIONE RISTORANTI
@keyframes show {
    from{
        opacity: 0;
    }
    to{
        opacity: 1;
    }
}
</style>