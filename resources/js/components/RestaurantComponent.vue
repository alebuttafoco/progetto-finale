<template>
<div class="wrapper py-5">

    <div class="restaurant bg-white p-0">
        <div class="img-restaurant-container">
            <img :src=" restaurant.image == null ? '../img/cover_restaurant.jpg' : '../storage/' + restaurant.image" alt="" />
        </div>

        <h1 class="p-2 pl-3">{{ restaurant.name }}</h1>

        <p class="p-2 pl-3">{{ restaurant.description }}</p>

        <div class="address p-2 pl-3">
            {{ restaurant.address }}, {{ restaurant.city }}, {{ restaurant.cap }}
        </div>

        <ul class="list-inline text-secondary p-2 pl-3">
            <li class="list-inline-item" v-for="category in restaurant.categories" :key="category.id" >
                {{ category.name }}
            </li>
        </ul>

        <div class="menu p-2">

            <h3 class="p-3">Menu</h3>
            <!-- PIATTO SINGOLO -->
            <div class="plate d-flex flex-wrap">
                <div @click="storagePlate(plate, index)" class="card m-3 position-relative" style="width: 15rem"  v-for="(plate, index) in restaurant.plates" :key="plate.id" >
                    <img class="plate-img" :src="'../storage/' + plate.image" :alt="plate.name" />

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
        <div class="cart_heading btn_large">
            <i class="fas fa-shopping-cart"></i>
            <span>totale {{ cart_price() }} €</span>
        </div>

        <div class="content">
                <div class="cart_item" v-for="(plate, index) in plates" :key="plate.id">
                    <span>{{ plate.name }}</span>

                    <div class="actions">
                        <i
                        @click="storagePlate(plate, index)"
                        class="fas fa-plus-circle text-success"
                        ></i>
                        <span>{{ plate.qty }}</span>
                        <i
                        @click="minusPlate(plate, index)"
                        class="fas fa-minus-circle text-danger"
                        ></i>
                    </div>
                </div>
                <span v-if="plates.length > 0" @click="emptyCart()" class="empty_cart bg-danger text-white" >Svuota il carrello <i class="fas fa-trash-alt"></i></span>

                <a class="checkout_link btn btn-success" href="../cart">Vai alla cassa</a>
        </div>
    </div>

</div>
</template>

<script>
import Axios from "axios";

export default {
  data() {
    return {
      restaurant: "",
      plates: [],
      restaurantOrder: [],
    };
  },

  methods: {
    cart_price() {
      let totalPrice = 0;
      this.plates.forEach((plate) => {
        totalPrice += plate.price * plate.qty;
      });
      return totalPrice;
    },
    callRestaurants() {
      Axios.get("/api/restaurants/" + this.$route.params.id)
        .then((resp) => {
          this.restaurant = resp.data.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
    storagePlate(plate) {
      let foodInCart = [];
      this.plates.forEach((food) => {
        foodInCart.push(food.id);
      });
      if (foodInCart.includes(plate.id)) {
        this.plates.forEach((food) => {
          if (food.id == plate.id) {
            food.qty++;
          }
        });
      } else {
        foodInCart.push(plate.id);
        if (this.restaurantOrder != plate.restaurant_id) {
            if (this.plates.length == 0) {
              this.plates.unshift(plate);
              this.restaurantOrder = plate.restaurant_id;
            } else if (confirm('Attenzione, cambiando ristorante perderai gli ordini attuali!')) {
              this.emptyCart();
              this.plates.unshift(plate);
              this.restaurantOrder = plate.restaurant_id;
            }
        } else {
            this.plates.unshift(plate);
        }
      }
      this.savePlates();
      this.saveRestaurantOrder();
    },
    saveRestaurantOrder() {
      const parsed = JSON.stringify(this.restaurantOrder);
      localStorage.setItem("restaurant", parsed);
    },
    savePlates() {
      const parsed = JSON.stringify(this.plates);
      localStorage.setItem("plates", parsed);
    },
    minusPlate(plate) {
      let foodInCart = [];
      this.plates.forEach((food) => {
        foodInCart.push(food.id);
      });
      if (foodInCart.includes(plate.id)) {
        this.plates.forEach((food) => {
          if (food.id == plate.id) {
            if (food.qty == 1) {
              this.removePlate();
            } else {
              food.qty--;
            }
          }
        });
      }
      this.savePlates();
    },
    removePlate(i) {
      this.plates.splice(i, 1);
      this.savePlates();
    },
    emptyCart() {
      this.restaurantOrder = [];
      this.plates = [];
      this.savePlates();
      this.saveRestaurantOrder();
    },
    getPlates() {
      if (localStorage.getItem("plates") == null) {
        this.savePlates();
      }
      this.plates = JSON.parse(localStorage.getItem("plates"));
    },

    getRestaurantOrder() {
      if (localStorage.getItem("restaurant") == null) {
        this.saveRestaurantOrder();
      }
      this.restaurantOrder = JSON.parse(localStorage.getItem("restaurant"));
    },
  },

  mounted() {
    this.callRestaurants();
    this.getPlates();
    this.getRestaurantOrder();
  },
};
</script>

<style lang="scss" scoped>
.cart {
  height: fit-content;
  width: 20%;
  margin: 0 1rem;
  background-color: white;
  border-radius: 1rem;
  position: sticky;
  top: 0;

  .content {
    min-height: 30rem;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
  }

  .cart_heading {
    display: flex;
    justify-content: space-between;
  }

  .cart_item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.3rem;
    border-bottom: 1px solid rgb(245, 245, 245);
  }

  .empty_cart {
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    padding: 0.3rem;
  }

  .checkout_link {
    margin-top: auto;
  }
}

.fas {
  cursor: pointer;
  font-size: 1.4rem;
}

.wrapper {
  width: 80%;
  margin: auto;
  display: flex;
}

.restaurant {
  width: 80%;
}

.address {
  font-size: 0.7rem;
}

.img-restaurant-container {
  height: 300px;
  width: 100%;
  img {
    width: 100%;
    height: inherit;
    object-fit: cover;
  }
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
</style>