<template>
<div class="container">
  <div class="shopping-cart">
    <div class="labels">
      <span class="d-flex justify-content-center">Il tuo carrello</span>
    </div>

    <div class="product">
      <div class="product-image ml-2"></div>
      <div class="product-details ml-2">Pizza</div>
      <div class="product-price ml-2">8€</div>
      <div class="d-flex ml-auto m-2">
        <div class="product-quantity ml-2">
          <i class="far fa-plus-square"></i>
          <span>1</span>
          <i class="far fa-minus-square"></i>
        </div>
        <div class="product-removal ml-2"><i class="fas fa-times"></i></div>
      </div>
    </div>

    <div class="product">
      <div class="product-image ml-2"></div>
      <div class="product-details ml-2">Carbonara</div>
      <div class="product-price ml-2">10€</div>
      <div class="d-flex ml-auto m-2">
        <div class="product-quantity ml-2">
          <i class="far fa-plus-square"></i>
          <span>1</span>
          <i class="far fa-minus-square"></i>
        </div>
        <div class="product-removal ml-2"><i class="fas fa-times"></i></div>
      </div>
    </div>

    <div class="totals">
      <div class="totals-item totals-item-final m-2">
        <label>Prezzo Finale</label>
        <div class="totals-value">100€</div>
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
      cart: [],
    };
  },
  methods: {},
  mounted() {
    const contenutoArchiviato = JSON.parse(localStorage.getItem("cart"));
    console.log(contenutoArchiviato.plates[0].name);
  },
};
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