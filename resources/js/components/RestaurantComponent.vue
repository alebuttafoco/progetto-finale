<template>
<div class="wrapper py-5">
    <div class="restaurant bg-white p-0">
        <div class="img-restaurant-container">
            <img class="img-restaurant" :src="'../storage/' + restaurant.image" alt="">
        </div>

        <h1 class="p-2 pl-3">{{ restaurant.name }}</h1>

        <p class="p-2 pl-3">{{ restaurant.description }}</p>

        <div class="address p-2 pl-3">
            {{ restaurant.address }}, {{ restaurant.city }}, {{ restaurant.cap }}
        </div>

        <ul class="list-inline text-secondary p-2 pl-3">
            <li class="list-inline-item" v-for="category in restaurant.categories" :key="category.id"> 
                {{category.name}}
            </li>
        </ul>

        <div class="menu p-2">
            <h3 class="p-3">Menu</h3>
            <!-- PIATTO SINGOLO -->
            <div class="plate d-flex flex-wrap" >

                <div @click="storagePlate(plate)" class="card m-3 position-relative" style="width: 15rem;" v-for="plate in restaurant.plates" :key="plate.id">
                    <img class="plate-img" :src=" '../storage/' + plate.image " :alt="plate.name">
                    <div class="card-body">
                        <h5 class="card-title">{{ plate.name }}</h5>
                        <p class="card-text mb-5">{{ plate.description }}</p>
                        <a href="#" class="btn btn-primary price-btn"><strong>{{ plate.price }} €</strong></a>
                    </div>
                </div>

            </div>
        </div>  
    </div>

    <div class="cart">
        <h4>CARRELLO <i class="fas fa-shopping-cart"></i></h4>
        <div class="content" v-for="(plate, index) in plates" :key='plate.id'>    
            <p> {{plate.name}}  ({{plate.qty}}) </p>
            <i @click="removePlate(index)" class="fas fa-trash-alt text-danger"></i>
        </div>
    </div>

</div>
</template>

<script>
import Axios from "axios";

export default {
    data(){ 
        return {
            restaurant: '',
            plates : [],
        }
    },
    methods: {
        callRestaurants(){
            Axios.get('/api/restaurants/' + this.$route.params.id)
            .then(resp => {
                this.restaurant = resp.data.data;
            })
            .catch(e => {
                console.error(e);
            })
        },
        storagePlate(plate) {
            if (this.plates.includes(plate)) {
                plate['qty'] += 1;
            } else {
                plate['qty'] = 1;
                this.plates.unshift(plate);
            }
            this.savePlates();
        },
        savePlates() {
            const parsed = JSON.stringify(this.plates);
            localStorage.setItem('plates', parsed);
        },
        removePlate(i){
            this.plates.splice(i, 1);
            this.savePlates();
        },
        getPlates(){
            if (this.plates != null) {
                this.plates = JSON.parse(localStorage.getItem('plates'));
            }
        },
    },
  mounted() {
    this.callRestaurants();
    this.getPlates();
  },
}
</script>

<style lang="scss" scoped>
.cart {
    width: 20%;
    height: 40rem;
    margin: 1rem;
    padding: 1rem;
    background-color: white;

    .content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
}

.wrapper{
    width: 80%;
    margin: auto;
    display: flex;
}

.restaurant{
    width: 80%;
}

.address {
  font-size: 0.7rem;
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
  object-fit: cover;
}

.price-btn {
  position: absolute;
  bottom: 1rem;
  right: 1rem;
  width: 5rem;
}

.card {
  transition: all 0.2s ease-in-out;
}

.card:hover {
  cursor: pointer;
  transform: translatey(-5px);
  box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.336);
  color: inherit;
}
</style>>

</style>