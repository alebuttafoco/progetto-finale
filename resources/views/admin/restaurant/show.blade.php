@extends('layouts.admin')

@section('titolo')
    <h1>{{ $restaurant->name }}</h1>
@endsection

@section('content')

{{-- bottone INDIETRO --}}
{{-- <div class="actions_bar mb-5">
    <a href="{{ route('admin.restaurant.index') }}" class="btn btn-primary" role="button" aria-pressed="true"><i
            class="fa fa-chevron-left" aria-hidden="true"></i> Indietro</a>
</div> --}}

{{-- contenuto --}}
<div class="admin_show">
    <div class="image_box text-center">
        <img class="img_restaurant" src="{{ $restaurant->image == null ? asset('img/cover_restaurant.jpg') : asset('storage/' . $restaurant->image) }}" alt="Copertina immagine ristorante">
    </div>

    <div class="description">
        <h3>Descrizione</h3>
        <p>{{ $restaurant->description }}</p>
        <h3>Indirizzo</h3>
        <div class="address">{{ $restaurant->address }}, {{ $restaurant->city }}, {{ $restaurant->cap }}</div>
        <h3>Categorie</h3>
        <ul>
            @foreach ($restaurant->categories as $category)
                <li class="list-inline-item">#{{ $category->name }}</li>
            @endforeach
        </ul>
    </div>
</div>

@endsection
