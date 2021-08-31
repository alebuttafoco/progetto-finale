@extends('layouts.app')

@section('content')
    <div class="jumbo">
        <video autoplay muted loop id="HomeVideo">
            <source src="{{ asset('img/video.mp4') }}" type="video/mp4">
        </video>
        <div class="overlay d-flex flex-column align-items-center justify-content-center">
            <h1>Ordina su DeliveBoo!</h1>
            <div class="search_div">

                <form action="#" method="post" novalidate="novalidate">
                    <div class="search_form d-flex align-items-center justify-content-center">
                        <div>
                            <input type="text" class="form-control search-slt" placeholder="Città / CAP">
                        </div>
                        <div>
                            <input type="text" class="form-control search-slt" placeholder="Ristorante">
                        </div>
                        <div>
                            <select class="form-control search-slt" id="Selector1">
                                <option disabled selected>Seleziona</option>
                                <option>Street Food</option>
                                <option>Pasta</option>

                            </select>
                        </div>
                        <div>
                            <button type="button" class="bttn">Cerca</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
