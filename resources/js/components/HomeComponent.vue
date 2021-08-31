<template>
<div>
    <div class="jumbo">
        <video autoplay muted loop id="HomeVideo">
            <source src="img/video.mp4" type="video/mp4">
        </video>
        
        <!-- RICERCA DEL RISTORANTE -->
        <div class="overlay d-flex flex-column align-items-center justify-content-center">
            <h1>Ordina su DeliveBoo!</h1>
            <div class="search_div">

                <form action="#" method="post" novalidate="novalidate">
                    <div class="search_form d-flex align-items-center justify-content-center">
                        <div>
                            <input type="text" class="form-control search-slt" placeholder="Città / CAP">
                        </div>
                        <div>
                            <input type="text" class="form-control search-slt" placeholder="Ristorante">
                        </div>
                        <div>
                            <select class="form-control search-slt" id="Selector1">
                                <option disabled selected>Seleziona</option>
                                <option>Street Food</option>
                                <option>Pasta</option>

                            </select>
                        </div>
                        <div>
                            <button @click="isVisibleRestaurants = true" type="button" class="bttn">Cerca</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- RISTORANTI VISUALIZZATI DOPO LA RICERCA -->
    <div class="restaurants" v-if="isVisibleRestaurants">
        <div class="card" v-for="restaurant in 10" :key='restaurant.id'>
            <img src="https://picsum.photos/536/354" alt="">

            <div class="details">
                <h3>NOME RISTORANTE</h3>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Axios from 'axios';

export default {
    data() {
        return{
            isVisibleRestaurants: false,
        }
    },
    methods: {},
    mouted(){}

}
</script>

<style lang="scss" scoped>
.restaurants {
    display: flex;
    flex-wrap: wrap;

    .card {
        flex-grow: 1;
        width: calc(100% / 5);
        min-width: 250px;
        margin: 1rem;
        background-color: white;
        img {
        width: 100%;
        }
        .details {
        padding: 1rem;
        }
    }
}
</style>