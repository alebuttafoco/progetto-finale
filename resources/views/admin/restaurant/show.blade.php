@extends('layouts.admin')

@section('titolo')
    <h1>{{ $restaurant->name }}</h1>
@endsection

@section('content')
    <div class="actions_bar">
        <a href="{{ route('admin.restaurant.index') }}" class="btn btn-primary" role="button" aria-pressed="true"><i
                class="fa fa-chevron-left" aria-hidden="true"></i> Indietro</a>
    </div>

    <div>
        <p>{{ $restaurant->description }}</p>
    </div>
@endsection
