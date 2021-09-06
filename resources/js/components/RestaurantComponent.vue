<template>
    <div class="container bg-white p-0" id="single-restaurant-page">

        <div class="img-restaurant-container">
            <h1>Immagine Ristorante</h1>
        </div>

        <h1 class="p-2 pl-3">{{ restaurants[0].name }}</h1>

        <p class="p-2 pl-3">
            {{ restaurants[0].description }}
        </p>
        <div class="address p-2 pl-3">{{ restaurants[0].address }}, {{ restaurants[0].city }}, {{ restaurants[0].cap }}</div>

        <ul class="list-inline text-secondary p-2 pl-3">
            <li class="list-inline-item">Categoria 1 </li>
            <li class="list-inline-item">Categoria 2 </li>
            <li class="list-inline-item">Categoria 3 </li>
        </ul>


        <div class="menu p-2">
            <h3 class="p-3">Tipo 1</h3>

            <!-- <div class="d-flex flex-wrap">
                @foreach ($plates as $plate)
                    <div class="card m-3 position-relative" style="width: 15rem;">
                        <img class="card-img-top plate-img" src="{{ $plate->image }}" alt="{{ $plate->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $plate->name }}</h5>
                            <p class="card-text mb-5">{{ $plate->description }}</p>
                            <a href="#" class="btn btn-primary price-btn"><strong>{{ $plate->price }} €</strong></a>
                        </div>
                    </div>
                @endforeach

            </div> -->
        </div>
        <div class="menu p-2">
            <h3 class="p-3">Tipo 2</h3>
        </div>
        <div class="menu p-2">
            <h3 class="p-3">Tipo 3</h3>
        </div>

    </div>
</template>

<script>
import Axios from 'axios';

export default {
    data(){ 
        return {
            restaurants: '',
            plates: '',
            categories: '',
        }
    },

    methods: {
        callRestaurants(){
            Axios.get('http://127.0.0.1:8000/api/restaurants')
            .then(resp => {
                console.log(resp.data.data);
                this.restaurants = resp.data.data;
            })
            .catch(e => {
                console.error(e);
            })
        },
    },
    mounted(){
        this.callRestaurants();
    }
}
</script>

<style lang="scss" scoped>
    #single-restaurant-page {

    .address {
        font-size: 0.7rem;
    }

    .address {
        font-size: 0.75rem;
    }

    .img-restaurant-container {
        height: 300px;
        width: 100%;
    }

    .img-restaurant {
        width: 100%;
        height: inherit;
        object-fit: cover;
    }

    .plate-img {
        border-bottom-left-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
        max-height: 10rem;
    }

    .price-btn {
        position: absolute;
        bottom: 1rem;
        right: 1rem;
        width: 5rem;
    }

    .card {
        transition: all .2s ease-in-out;
    }

    .card:hover{
        cursor: pointer;
        transform: translatey(-5px);
        box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.336);
        color: inherit; 
    }
}
</style>>

</style>