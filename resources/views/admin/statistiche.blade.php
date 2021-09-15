@extends('layouts.admin')
@section('titolo')
<h1>Dati del tuo Ristorante</h1>
    
@endsection



@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">

window.onload = function () {
    let order_month = {{$order_month}};
    let earnings_month = {{$earnings_month}};
    let earnings_years_key = {{$earnings_years_key}};
    let earnings_years_value = {{$earnings_years_value}};
    let orders_years_value = {{$orders_years_value}};
    let orders_years_key = {{$orders_years_key}};
    //ordini per mese
	var ctx = document.getElementById('ordinePerMese').getContext('2d');
    var ordinePerMese = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
        datasets: [{
            label: 'Ordini per mese',
            data: order_month,
            backgroundColor: [
                '#36a2eb',
            ],
            borderColor: [
                '#36a2eb',
            ],
            borderWidth: 2,
            pointBorderWidth: 3,
            pointHitRadius: 8
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    });
    //guadagni per mese
    var ctx = document.getElementById('guadagniPerMese').getContext('2d');
    var guadagniPerMese = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
        datasets: [{
            label: 'Guadagni per mese',
            data: earnings_month,
            backgroundColor: [
                '#ff6384',
            ],
            borderColor: [
                '#ff6384',
            ],
            borderWidth: 2,
            pointBorderWidth: 3,
            pointHitRadius: 8
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    });
    //guadagni per anno
	var ctx = document.getElementById('guadagniPerAnno').getContext('2d');
    var guadagniPerAnno = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: earnings_years_key,
        datasets: [{
            label: 'Guadagni per anno',
            data: earnings_years_value,
            backgroundColor: [
                '#36a2eb',
                '#ff6384',
                '#4bc0c0',
                '#F4B400'
            ],
            borderWidth: 1,
            hoverOffset: 8,
            spacing: 10
        }]
    },
    });
    //ordini per anno
	var ctx = document.getElementById('ordiniPerAnno').getContext('2d');
    var ordiniPerAnno = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: orders_years_key,
        datasets: [{
            label: 'Ordini per anno',
            data: orders_years_value,
            backgroundColor: [
                '#F4B400',
                '#36a2eb',
                '#ff6384',
                '#4bc0c0',
                
            ],
            borderWidth: 1,
            hoverOffset: 8,
            spacing: 10
        }]
    },
    });
}
</script>

<div class="container">

    <div class="row">

        <div class="p-3 d-inline col-12 col-sm-6 col-md-3 text-center">
            <span>Guadagni totali : </sp>
            <span><strong>{{$all_profit}} €</strong> </span>
        </div>
        <div class="p-3 d-inline col-12 col-sm-6 col-md-3 text-center">
            <span>Ordini totali: </sp>
            <span><strong>{{$order_count}}</strong></span>
        </div>
        <div class="p-3 d-inline col-12 col-sm-6 col-md-3 text-center">
            <span>Ordini di questo mese: </sp>
            <span><strong>{{$month_order}}</strong></span>
        </div>
        <div class="p-3 d-inline col-12 col-sm-6 col-md-3 text-center">
            <span>Ordini di questo anno: </sp>
            <span><strong>{{$year_order}}</strong></span>
        </div>
    </div>
    <!-- Grafici -->

    <!-- ordini  e guadagni per mese -->
    <div class="row pt-5">
        <div class="col-12 col-md-6">
            <div>
                <canvas id="ordinePerMese"></canvas>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div>
                <canvas id="guadagniPerMese"></canvas>
            </div>
        </div>
    </div>

    <div class="row pt-5">
        <div class="col-12 offset-md-1 col-md-4 text-center">
            <div>
                <h3>Guadagni per anno</h3>
                <canvas id="guadagniPerAnno"></canvas>
            </div>
        </div>
           
        <div class="col-12 offset-md-2 col-md-4 text-center">
            <div>
                <h3>Ordini per anno</h3>
                <canvas id="ordiniPerAnno"></canvas>
            </div>
        </div>
    </div>
    
    <!-- guadagni per anno -->
    <!-- <div class="row d-flex justify-content-center pt-5 text-center">
        <div>
            <h3>Guadagni per anno</h3>
            <canvas id="guadagniPerAnno" width="800"></canvas>
        </div>
    </div> -->
    <!-- ordini per anno -->
    <!-- <div class="row d-flex justify-content-center pt-5 text-center">
        <div>
            <h3>Ordini per anno</h3>
            <canvas id="ordiniPerAnno" width="800"></canvas>
        </div>
    </div> -->

</div>
    
    

    

@endsection
