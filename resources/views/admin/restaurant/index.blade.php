@extends('layouts.admin')

@section('titolo')
    <h1> Dettagli Ristorante</h1>
@endsection

@section('content')
    <h4>index per il ristorante</h4>
    <a href="{{ route('admin.restaurant.create') }}">Aggiungi restaurant</a>
@endsection
