@extends('layouts.admin')

@section('titolo')
    <h1>{{ $restaurant->name }}</h1>
@endsection

@section('content')

    <div class="actions_bar mb-5">
        <a href="{{ route('admin.restaurant.index') }}" class="btn btn-primary" role="button" aria-pressed="true"><i
                class="fa fa-chevron-left" aria-hidden="true"></i> Indietro</a>
    </div>
    <div class="container p-0 w-auto" id="single-restaurant-page">
        <div class="img-restaurant-container">
            <img class="img-restaurant"
                src="{{ $restaurant->image == null ? asset('img/cover_restaurant.jpg') : asset('storage/' . $restaurant->image) }}"
                alt="Copertina immagine ristorante">
        </div>

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
            <h3 class="p-3">Menù e i tuoi piatti</h3>

            <div class="d-flex flex-wrap">
                @if (empty($plates))

                    @foreach ($plates as $plate)
                        <div class="card m-3 position-relative" style="width: 15rem;">
                            <img class="card-img-top plate-img" src="{{ $plate->image }}" alt="{{ $plate->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $plate->name }}</h5>
                                <p class="card-text mb-5">{{ $plate->description }}</p>
                                <a href="#" class="btn btn-primary price-btn"><strong>{{ $plate->price }} €</strong></a>
                            </div>
                        </div>
                    @endforeach

                @else
                    <h5>Nessun piatto</h5>
                @endif
            </div>

        </div>

    </div>
@endsection
