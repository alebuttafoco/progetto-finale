@extends('layouts.app')

@section('content')
    {{-- <div class="flex-center position-ref full-height">
        <div class="container">
            <h1>Home DeliveBoo</h1>
        </div>
    </div> --}}

    <body>
        <header>
            <div class="d-flex flex-wrap align-items-center justify-content-center">
                <div class="container d-flex flex-wrap align-items-center justify-content-around">
                    <a href="/" id="logo" class="d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="./asset/img/logo_secondary.png" alt="Logo DeliveBoo">
                    </a>

                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="link">I nostri ristoranti</a></li>
                        <li><a href="#" class="link">Riders</a></li>
                        <li><a href="#" class="link">FAQs</a></li>
                        <li><a href="#" class="link">Contattaci</a></li>
                    </ul>

                    <div class="btn_div d-flex justify-content-end">
                        <button type="button" class="bttn">Login</button>
                        <button type="button" class="bttn">Registrati</button>
                    </div>
                </div>
            </div>


            <div class="jumbo">
                <video autoplay muted loop id="HomeVideo">
                    <source src="./asset/img/video.mp4" type="video/mp4">
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
        </header>
    </body>
@endsection
