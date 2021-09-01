@extends('layouts.admin')

@section('titolo')
    <h1>pagina crea nuovo ristorante</h1>

@endsection

@section('content')
    <div class="container">
        <h1>pagina crea ristorante</h1>

        <div class="actions_bar">
            <a href="{{ route('admin.restaurant.index') }}" class="btn btn-primary" role="button" aria-pressed="true"><i
                    class="fa fa-chevron-left" aria-hidden="true"></i> Indietro</a>
        </div>
        @include('components.error')


    </div>
@endsection
