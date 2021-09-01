@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card">
            <div class="card-body">
                <h1>RISTORANTE: {{$restaurant->name}}</h1>
                <p>{{$restaurant->description}}</p>

            </div>
        </div>
        
        
        <div class="menu">
            <h2>menu 1</h2>
        </div>
        <div class="menu">
            <h2>menu 2</h2>
        </div>
        <div class="menu">
            <h2>menu 3</h2>
        </div>

    </div>
    
@endsection