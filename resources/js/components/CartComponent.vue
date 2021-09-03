<template>
    <div>
        <nav>
    <div class="container">
        <h1 class="p-3">Carrello</h1>

        <div class="shopping-cart">
          <div class="item">
            <div class="image">
              <img src="#" alt=""> 
            </div>

            <div class="description">
              <span>Carbonara di Andrei</span>
            </div>

            <div class="quantity">
              <button class="plus-btn" type="button" name="button">
                <i class="fas fa-plus"></i>
              </button>
              <input type="text" name="name" value="1">
              <button class="minus-btn" type="button" name="button">
                <i class="fas fa-minus"></i>
              </button>
            </div>

          </div>
          <hr>
        </div>
        
    </div>
</nav>
    </div>
</template>

<script>
import Axios from 'axios';

export default {
    data() {
        return{
            
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
    width: 46.875rem;
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
    height: 3.125rem;
    display: flex;
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
</style>