@extends('layouts.admin')

@section('titolo')
    <h1>{{ $restaurant->name }}</h1>
@endsection

@section('content')
    <div>
        <p>{{ $restaurant->description }}</p>
    </div>
@endsection
