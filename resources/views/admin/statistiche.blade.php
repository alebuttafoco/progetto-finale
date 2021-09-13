@extends('layouts.admin')
@section('titolo')
<h1>Dati del tuo Ristorante</h1>
    
@endsection

@section('content')
    <div class="container">
        <div class="neufo d-inline mr-4">
            <span>Guadagni totali : </sp>
            <span><strong>{{$all_profit}} €</strong> </span>
        </div>
        <div class="neufo d-inline mr-4">
            <span>Ordini totali: </sp>
            <span><strong>{{$order_count}}</strong></span>
        </div>
        <div class="neufo d-inline mr-4">
            <span>Ordini di questo mese: </sp>
            <span><strong>{{$month_order}}</strong></span>
        </div>
        <div class="neufo d-inline mr-4">
            <span>Ordini di questo anno: </sp>
            <span><strong>{{$year_order}}</strong></span>
        </div>

            
    </div>
@endsection
