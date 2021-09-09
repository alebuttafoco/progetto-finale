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
            @foreach ($restaurant->categories as $category)
                <li class="list-inline-item">{{ $category->name }}</li>
            @endforeach
        </ul>

    </div>
@endsection
