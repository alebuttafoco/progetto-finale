@extends('layouts.app')

@section('content')

    <div class="container bg-white p-0" id="single-restaurant-page">

        <div class="img-restaurant"></div>

        <h1 class="p-2 pl-3">Nome del Ristorante {{$restaurant->name}}</h1>

        <p class="p-2 pl-3">
            Descrizone: Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum alias, beatae esse id nobis sunt ipsa vero reiciendis at culpa facere, neque, quae delectus laudantium! Minus cum laudantium libero ad?
            {{$restaurant->description}
        </p>

        <div class="address p-2 pl-3">Via Marco Polo 53, Ravenna, 05422</div>

        <ul class="list-inline text-secondary p-2 pl-3">
            <li class="list-inline-item">Categoria 1 </li>
            <li class="list-inline-item">Categoria 2 </li>
            <li class="list-inline-item">Categoria 3 </li>
        </ul>
        
        
        <div class="menu p-2">
            <h3 class="p-3">Tipo 1</h3>
            <div class="d-flex flex-wrap justify-content-between">
                <div class="card m-3 position-relative" style="width: 15rem;">
                    <img class="card-img-top plate-img" src="https://www.buttalapasta.it/wp-content/uploads/2014/09/xpasta-ncasciata-siciliana.jpg.pagespeed.ic.PU8sPKQdAW.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Piatto 1</h5>
                        <p class="card-text mb-5">a</p>
                        <a href="#" class="btn btn-primary price-btn"><strong>9 €</strong></a>
                    </div>
                </div>
                <div class="card m-3 position-relative" style="width: 15rem;">
                    <img class="card-img-top plate-img" src="https://www.buttalapasta.it/wp-content/uploads/2014/09/xpasta-ncasciata-siciliana.jpg.pagespeed.ic.PU8sPKQdAW.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Piatto 2</h5>
                        <p class="card-text mb-5">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary price-btn"><strong>12,90 €</strong></a>
                    </div>
                </div>
                <div class="card m-3 position-relative" style="width: 15rem;">
                    <img class="card-img-top plate-img" src="https://www.buttalapasta.it/wp-content/uploads/2014/09/xpasta-ncasciata-siciliana.jpg.pagespeed.ic.PU8sPKQdAW.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Piatto 3</h5>
                        <p class="card-text mb-5">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary price-btn"><strong>11,50 €</strong></a>
                    </div>
                </div>
                <div class="card m-3 position-relative" style="width: 15rem;">
                    <img class="card-img-top plate-img" src="https://www.buttalapasta.it/wp-content/uploads/2014/09/xpasta-ncasciata-siciliana.jpg.pagespeed.ic.PU8sPKQdAW.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Piatto 4</h5>
                        <p class="card-text mb-5">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary price-btn"><strong>10 €</strong></a>
                    </div>
                </div>
                <div class="card m-3 position-relative" style="width: 15rem;">
                    <img class="card-img-top plate-img" src="https://www.buttalapasta.it/wp-content/uploads/2014/09/xpasta-ncasciata-siciliana.jpg.pagespeed.ic.PU8sPKQdAW.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Piatto 5</h5>
                        <p class="card-text mb-5">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary price-btn"><strong>15 €</strong></a>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="menu p-2">
            <h3 class="p-3">Tipo 2</h3>
        </div>
        <div class="menu p-2">
            <h3 class="p-3">Tipo 3</h3>
        </div>

    </div>

@endsection 