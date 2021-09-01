@extends('layouts.admin')

@section('titolo')
    <h1>{{ $plate->name }}</h1>

@endsection

@section('content')
    <div>
        <p>{{ $plate->description }}</p>
    </div>
@endsection
