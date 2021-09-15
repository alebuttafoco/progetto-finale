<template>
<div class="my_container">
  <div class="shopping-cart">
    <div class="labels">
      <h3 class="d-flex justify-content-center m-2 your-cart p-2">Il tuo carrello</h3>
    </div>

      <div class="product" v-for="(plate, index) in plates" :key="plate.id">
        <img :src="'storage/' + plate.image" alt="" />
        <div class="product-details ml-2 d-flex flex-column ">
          <span>{{ plate.name }}</span>
          <span>{{ plate.price }} € </span>
        </div>
        <!-- <div class="product-price ml-2"></div> -->

      <div class="d-flex ml-auto m-2">
        <div class="product-quantity ml-2">
          <i @click="minusPlate(plate)" class="fas fa-minus-circle text-danger fa-lg"></i>
          <span class="plate-number">{{plate.qty}}</span>
          <i @click="storagePlate(plate)" class="fas fa-plus-circle text-success fa-lg"></i>
          <i @click="removePlate(index)" class="fas fa-times product-removal fa-lg ml-2"></i>
        </div>

          
        </div>
      </div>

      <div class="totals">
        <div class="totals-item totals-item-final m-2">
          <label>Prezzo Finale</label>
          <div class="totals-value">{{ cart_price() }} €</div>
        </div>
      </div>
    </div>
    
    <!-- inserire due divisori/contenitori per il form -->

  </div>
</template>

<script>
import Axios from "axios";

export default {
  data() {
    return {
      plates: [],
    };
  },

  methods: {
    cart_price() {
      let totalPrice = 0;
      this.plates.forEach((plate) => {
        totalPrice += plate.price * plate.qty;
      });
      const parsed = JSON.stringify(totalPrice);
      localStorage.setItem("totalPrice", parsed);
      return totalPrice.toFixed(2);
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
        this.plates.unshift(plate);
      }
      this.savePlates();
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
    getPlates() {
      if (this.plates != null) {
        this.plates = JSON.parse(localStorage.getItem("plates"));
        console.log(this.plates);
      }
    },
  },

  mounted() {
    this.getPlates();
  }
}
</script>

<style lang="scss" scoped>

.shopping-cart {
  margin: 5rem auto;
  background: #ffffff;
  box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.1);
  border-radius: 0.375rem;
  display: flex;
  flex-direction: column;
}
.your-cart{
  font-size: 2.75rem;
  color: white;
  border-radius: 0.25rem;
  background-color: #3178c6;
}
.product{
  display: flex;
  padding: 1.125rem;
  margin: 0;
  align-items: center;
  border-bottom: 1px solid #5053554a;

  img{
    width: 7rem;
    height: 7rem;
    border-radius: 5px;
    object-fit: cover;
  }
}
.totals {
  flex-direction: row;
  display: flex;
  justify-content: flex-end;
}
.totals-item{
  font-size: 1.125rem;
  font-weight: 600;
  padding: 1.125rem;
}
.product-quantity{
  display:flex;
  .fas{
    &:active{
      transform:scale(.9);
    }
    cursor: pointer;
    transition: 0.3s ease;
  }
}
.plate-number{
  font-size: 1.05rem;
  font-weight: 600;
  width: 2rem;
  text-align: center;
  line-height: 1;
}
form {
  margin: 0 auto;
  width: fit-content;
  padding: 1em;
  border-radius: .125rem;
  display: flex;
  flex-direction: column;
}

ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

form li + li {
  margin-top: 1em;
}

label, small {
  display: inline-block;
  width: 90px;
}

input {
  font: 1em sans-serif;
  width: 12.5rem;
  box-sizing: border-box;
  border: 1px solid #999;
}

input:focus {
  border-color: #000;
}

button {
  margin-left: .5em;
}
/* Pulsante Verde */
.button {
  cursor: pointer;
  font-weight: 500;
  left: 3px;
  line-height: inherit;
  position: relative;
  text-decoration: none;
  text-align: center;
  border-style: solid;
  border-width: 1px;
  border-radius: 3px;
  display: inline-block;
  padding-left: 90px; 
}
#submit-button {
  margin-top: auto;
  width: fit-content;
  align-self: center;
}
.button--small {
  padding: 10px 20px;
  font-size: 0.875rem;
}
.button--green {
  outline: none;
  background-color: #64d18a;
  border-color: #64d18a;
  color: white;
  transition: all 200ms ease;
}
.button--green:hover {
  background-color: #8bdda8;
  color: white;
}
</style>