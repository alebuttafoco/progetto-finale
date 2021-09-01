<template>
<div class="home_wrapper">
    <!-- <video autoplay muted loop id="HomeVideo">
        <source src="img/video.mp4" type="video/mp4">
    </video> -->

    <!-- RICERCA DEL RISTORANTE -->
    <div :class=" isVisibleRestaurants ? 'sticky' : 'search_center' ">
        <div v-if="!isVisibleRestaurants" class="search_restaurants text-center">
            <h1>Ordina su DeliveBoo!</h1>
            <span @click="isVisibleRestaurants = true, selectedCategory = '' " class="bttn px-4 py-2 m-2">Visualizza tutti i Ristoranti</span>
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
                @click="isVisibleRestaurants = true, selectedCategory = '' " 
                class="px-4 py-2 m-2"
                :class="selectedCategory == '' ? 'bttn' : 'bttn_reverse' ">
                Visualizza tutti i Ristoranti
            </div>

            <div class="px-4 py-2 m-2" 
                :class="selectedCategory == category.id ? 'bttn' : 'bttn_reverse' "
                @click="isVisibleRestaurants = true, selectedCategory = category.id" 
                v-for="category in categories" :key='category.id'>
                {{category.name}}
            </div>
        </div>
    </div>

    <!-- RISTORANTI VISUALIZZATI DOPO LA RICERCA -->
    <div class="restaurants" v-if="isVisibleRestaurants">
        <a :href="'./restaurants/' + selectedRestaurant " @click="selectedRestaurant = restaurant.id" class="my_card" v-for="restaurant in restaurants" :key='restaurant.id'>
            <div>
                <img v-if="restaurant.category_id == selectedCategory || selectedCategory == '' " :src="restaurant.image" alt="">
                <div v-if="restaurant.category_id == selectedCategory || selectedCategory == '' " class="details">
                    <h3> {{restaurant.name}} </h3>
                </div>
            </div>
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
            selectedCategory: '',
            selectedRestaurant: '',
        }
    },
    methods: {
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
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
    }
    to{
        position: sticky;
        top: 0;
        z-index: 9999;
        opacity: 1;
    }
}

.restaurants {
    width: 80%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    animation: show .5s .5s ease;
    animation-fill-mode: backwards;

    .my_card {
        flex-grow: 1;
        width: calc(100% / 5);
        min-width: 250px;
        margin: 1rem;
        background-color: rgb(240, 240, 240);
        text-decoration: none;
        transition: .2s ease;

        &:hover{
            transform: translatey(-5px);
            box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.336);
            color: inherit;
        }

        img {
            width: 100%;
        }

        .details {
            padding: 1rem;
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