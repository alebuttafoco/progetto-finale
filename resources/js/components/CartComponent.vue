<template>

  
    <div class="container">
        <h1 class="p-3">Carrello</h1>

        <div class="shopping-cart">
          <div class="item">
            <div class="image">
              <img src="#" alt=""> 
            </div>

            <div class="description">
              <span>Carbonara di Andrei</span>
              <span>5,8</span>
            </div>

            <div class="quantity">
              <button class="plus-btn" type="button" name="button">
                <i class="fas fa-plus"></i>
              </button>
              <input class="input" type="text" name="name" value="1">
              <button class="minus-btn" type="button" name="button">
                <i class="fas fa-minus"></i>
              </button>
            </div>

          </div>

          <div class="item">
            <div class="image">
              <img src="#" alt=""> 
            </div>

            <div class="description">
              <span>Pasta alla norma di Giuse</span>
              <span>13,4</span>
            </div>

            <div class="quantity">
              <button class="plus-btn" type="button" name="button">
                <i class="fas fa-plus"></i>
              </button>
              <input class="input" type="text" name="name" value="1">
              <button class="minus-btn" type="button" name="button">
                <i class="fas fa-minus"></i>
              </button>
            </div>

          </div>

          <div class="d-flex price-border">
              <span class="p-4">Totale</span>
              <!-- <span class="full-price p-4">12,3 €</span> -->
          </div>
        </div>
        

        <!-- box del riepilogo del carrello -->
        <div class="cart-box">
          <div class="cart-header">
            <h5 class="cart-heading">Riepilogo ordine</h5>
            <!-- <h5>Rimuovi tutto</h5> -->
          </div>
          <div class="cart-items">
            <!-- <div class="image-box">
              <img src="#" alt="">
            </div> -->
            <div class="description">
              <span class="plate-name"></span>
            </div>
            <div class="item-counter">
              <!-- numero dei piatti ordinati -->
              <div class="btn">+</div>
              <div class="count">1</div>
              <div class="btn">-</div>
            </div>
            <div class="price">
              <!-- inserisci prezzo intero // prima del coupon -->
              <div class="amount">1.99€</div>
              <div class="save">Salva per dopo</div>
              <div class="remove">Rimuovi</div>
            </div>
          </div>
          <hr>
          <div class="checkout">
            <div class="total">

              <div>
                <div class="subtotal">3.99€</div>
                <div class="items-number">1</div>
              </div>

              <div class="full-price">3.99€</div>
            </div> <button>Conferma e paga</button>
          </div>
          
          
        </div>
    </div>


</template>

<script>
import Axios from 'axios';

export default {
    data() {
        return{
            cart: [
                [
                    prezzo=12,
                    nome="carbonara",
                    quantità=1,
                ],
                [
                    prezzo=10,
                    nome="lasagne",
                    quantità=1,
                ],
                [
                    prezzo=9,
                    nome="pizza",
                    quantità=1,
                ],
            ],
        }
    },
    methods: {
        
    },
    mounted(){
        
    }
}
</script>

<style lang="scss" scoped>
/* */ 
.shopping-cart {
    /* width: 46.875rem; */ 
    height: 25rem;
    margin: 5rem auto;
    background: #FFFFFF;
    box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
    border-radius: .375rem;
   
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
.plus-btn, .minus-btn{
    border-radius: 3px;
    width: 23px;
    background-color: white;
    border: 1px solid black;
}
.quantity{
    margin-left: auto;
}

.full-price{
    margin-left: auto;
}
.input{
    width: 2rem;
    text-align: right;
}
.price-border{
    border-top: 1px solid black;
}

.cart-box{
  width: 25%;
  height: 25%;
  background-color: #fff;
  border-radius: 20px;
  /* box-shadow: 0 25px 40px; */
}
.cart-header{
  margin: auto;
  width: 90%;
  height: 10%;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.cart-heading{
  font-size: 20px;
  font-family: 'Open Sans';
  font-weight: 600;
}
.cart-items{
  margin: auto;
  width: 90%;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.description{
  height: 100%;
}
.plate-name{
  
}
</style>