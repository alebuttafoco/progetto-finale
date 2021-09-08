<template>
<div class="container">
  <div class="shopping-cart">
    <div class="labels">
      <span class="d-flex justify-content-center">Il tuo carrello</span>
    </div>

    <div class="product" v-for="(plate, index) in plates" :key='plate.id'>
      <img width="80" :src="'storage/' + plate.image" alt="">
      <div class="product-details ml-2">{{plate.name}}</div>
      <div class="product-price ml-2">{{plate.price}}</div>

      <div class="d-flex ml-auto m-2">
        <div class="product-quantity ml-2">
          <i @click="storagePlate(plate)" class="fas fa-plus-circle text-success"></i>
          <span>{{plate.qty}}</span>
          <i @click="minusPlate(plate)" class="fas fa-minus-circle text-danger"></i>
        </div>

        <div @click="removePlate(index)" class="product-removal ml-2"><i class="fas fa-times"></i></div>
      </div>

    </div>

    <div class="totals">
      <div class="totals-item totals-item-final m-2">
        <label>Prezzo Finale</label>
        <div class="totals-value">{{cart_price()}} €</div>
      </div>
    </div>
    <button id="submit-button" class="button button--small button--green">Conferma e Paga</button>
  </div>
</div>
</template>

<script>
import Axios from "axios";

export default {
  data() {
    return {
      plates: [],
    }
  },

  methods: {
    cart_price(){
      let totalPrice = 0;
      this.plates.forEach(plate => {
          totalPrice += plate.price * plate.qty;
      })
      return totalPrice;
    },
    storagePlate(plate) {
      let foodInCart = [];
      this.plates.forEach(food => {
          foodInCart.push(food.id);
      })
      if (foodInCart.includes(plate.id)) {
          this.plates.forEach(food => {
              if (food.id == plate.id) {
                  food.qty++;
              }
          })
      } else {
          foodInCart.push(plate.id)
          this.plates.unshift(plate);
      }
      this.savePlates();
    },
    savePlates() {
      const parsed = JSON.stringify(this.plates);
      localStorage.setItem('plates', parsed);
    },
    minusPlate(plate){
      let foodInCart = [];
      this.plates.forEach(food => {
          foodInCart.push(food.id);
      })
      if (foodInCart.includes(plate.id)) {
          this.plates.forEach(food => {
              if (food.id == plate.id) {
                  if (food.qty == 1) {
                      this.removePlate();
                  } else {
                      food.qty--;
                  }
              }
          })
      }
      this.savePlates();
    },
    removePlate(i){
      this.plates.splice(i, 1);
      this.savePlates();
    },
    getPlates(){
      if (this.plates != null) {
          this.plates = JSON.parse(localStorage.getItem('plates'));
          console.log(this.plates);
      }
    },
  },

  mounted() {
    this.getPlates();
  },

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
.product{
  display: flex;
}
.totals{
  flex-direction: row;
  display: flex;
  justify-content: flex-end;
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
}
#submit-button{
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