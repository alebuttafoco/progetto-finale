@extends('layouts.admin')
@section('titolo')
<h1>Dati del tuo Ristorante</h1>
    
@endsection

@section('content')
    <div class="container">
        <div>
            <span>Guadagni totali</sp>
                ----------
            <span>{{$all_profit}}</span>
        </div>
        <div>
            <span>Ordini totali</sp>
                ----------
            <span>{{$order_count}}</span>
        </div>
        <div>
            <span>Ordini di questo mese</sp>
                ----------
            <span>{{$month_order}}</span>
        </div>
        <div>
            <span>Ordini di questo anno</sp>
                ----------
            <span>{{$year_order}}</span>
        </div>
    </div>
@endsection
