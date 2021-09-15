@extends('layouts.admin')

@section('titolo')
    <h1>{{ $plate->name }}</h1>
    
@endsection

@section('content')
{{-- torna INDIETRO --}}
{{-- <div>
    <a class="btn btn-success mb-4" href="{{URL::previous()}}"> <i class="fas fa-chevron-left"></i> Indietro</a>
</div> --}}

    
    {{-- contenuto --}}
    <div class="admin_show">
        <div class="image_box text-center">
            <img class="img_restaurant" src="{{ asset('storage/' . $plate->image) }}" alt="">
        </div>

        <div class="description">
            <h3>Descrizione</h3>
            <p>{{ $plate->description }}</p>
    
            <h3>Prezzo</h3>
            <span>{{ $plate->price }} €</span>
    
            <h3>Tipologia</h3>
            <span>{{ $plate->type }}</span>
    
            <h3>Visibilità del piatto</h3>
            <span>{{ $plate->visible === 0 ? 'Non visibile' : 'Visibile' }}</span>
        </div>
    </div>

    
@endsection
