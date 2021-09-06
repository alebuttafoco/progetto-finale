<template>
  <div class="container">
    <h1 class="p-3">Carrello</h1>

    <div class="shopping-cart">
      <div class="item">
        <div class="image">
          <img src="#" alt="" />
        </div>

        <div class="description">
          <span>Carbonara di Andrei</span>
          <span>5,8</span>
        </div>

        <div class="quantity">
          <button class="plus-btn" type="button" name="button">
            <i class="fas fa-plus"></i>
          </button>
          <input class="input" type="text" name="name" value="1" />
          <button class="minus-btn" type="button" name="button">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>

      <div class="item">
        <div class="image">
          <img src="#" alt="" />
        </div>

        <div class="description">
          <span>Pasta alla norma di Giuse</span>
          <span>13,4</span>
        </div>

        <div class="quantity">
          <button class="plus-btn" type="button" name="button">
            <i class="fas fa-plus"></i>
          </button>
          <input class="input" type="text" name="name" value="1" />
          <button class="minus-btn" type="button" name="button">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>

      <div class="d-flex price-border">
        <span class="p-4">Totale</span>
        <span class="full-price p-4">12,3 €</span>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";

export default {
  data() {
    return {
      cart: [
        [(prezzo = 12), (nome = "carbonara"), (quantità = 1)],
        [(prezzo = 10), (nome = "lasagne"), (quantità = 1)],
        [(prezzo = 9), (nome = "pizza"), (quantità = 1)],
      ],
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
/* */
.shopping-cart {
  /* width: 46.875rem; */
  height: 25rem;
  margin: 5rem auto;
  background: #ffffff;
  box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.1);
  border-radius: 0.375rem;

  display: flex;
  flex-direction: column;
}
.item {
  padding: 20px 30px;
  /* height: 3.125rem; */
  display: flex;
  /* margin-bottom: 1rem; */
}
.buttons {
  position: relative;
  padding-top: 1.875rem;
}
.plus-btn,
.minus-btn {
  border-radius: 3px;
  width: 23px;
  background-color: white;
  border: 1px solid black;
}
.quantity {
  margin-left: auto;
}

.full-price {
  margin-left: auto;
}
.input {
  width: 2rem;
  text-align: right;
}
.price-border {
  border-top: 1px solid black;
}
</style>