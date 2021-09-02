@extends('layouts.app')

@section('content')

<nav>
    <div class="container">
        <h1 class="p-3">Carrello</h1>

        <div id="border" class="card-cart">

      <section>
        <img class="image_border">
        <h1>
          Order Summary
        </h1>
      </section>

      <div class="container">
        <p>
           
        </p>
      </div>


      <div class="grid">
        <button class="flex-container">
          <div class="flex-item">
            
          </div>
          <div class="flex-item">
            <h3>Annual Plan</h2>
              <span>
                $59.99/year
              </span>
          </div>
          <div class="flex-item">
            <h3>
              <a href="#">Change</a>
            </h3>
          </div>
        </button>
      </div>

      <div>
        <button class="lilac">
          Proceed to Payment
        </button>
      </div>


      <div>
        <span class="dark-blue">
          Cancel Order
        </span>
      </div>



    </div>

</nav>

@endsection