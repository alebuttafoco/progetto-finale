@extends('layouts.admin')

@section('titolo')
    <h1>pagina lista piatti</h1>

@endsection

@section('content')
    <div class="container">

        <a href="{{ route('admin.plate.create') }}">Aggiungi un nuovo piatto</a>
    </div>
@endsection
