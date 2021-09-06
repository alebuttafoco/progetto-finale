@extends('layouts.app')

@section('content')

    <div class="container bg-white p-0" id="single-restaurant-page">

        <div class="img-restaurant-container">
            <img class="img-restaurant" src="
                        {{ $restaurant->image == null ? asset('img/cover_restaurant.jpg') : asset('storage/' . $restaurant->image) }}
                        " alt="">
        </div>

        <h1 class="p-2 pl-3">{{ $restaurant->name }}</h1>

        <p class="p-2 pl-3">
            {{ $restaurant->description }}
        </p>

        <div class="address p-2 pl-3">{{ $restaurant->address }}, {{ $restaurant->city }}, {{ $restaurant->cap }}</div>

        <ul class="list-inline text-secondary p-2 pl-3">
            <li class="list-inline-item">Categoria 1 </li>
            <li class="list-inline-item">Categoria 2 </li>
            <li class="list-inline-item">Categoria 3 </li>
        </ul>


        <div class="menu p-2">
            <h3 class="p-3">Menu</h3>

            <div class="d-flex flex-wrap">
                @foreach ($plates as $plate)
                    <div class="card m-3 position-relative" style="width: 15rem;">
                        <img class="card-img-top plate-img" src="{{asset('storage/' . $plate->image)}}" alt="{{ $plate->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $plate->name }}</h5>
                            <p class="card-text mb-5">{{ $plate->description }}</p>
                            <a href="#" class="btn btn-primary price-btn"><strong>{{ $plate->price }} €</strong></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>

@endsection
