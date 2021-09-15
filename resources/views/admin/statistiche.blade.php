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
    type: 'bar',
    data: {
        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
        datasets: [{
            label: 'Ordini per mese',
            data: order_month,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
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
    type: 'bar',
    data: {
        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
        datasets: [{
            label: 'Guadagni per mese',
            data: earnings_month,
            backgroundColor: [
                'rgba(155, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
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
    type: 'bar',
    data: {
        labels: earnings_years_key,
        datasets: [{
            label: 'Guadagni per anno',
            data: earnings_years_value,
            backgroundColor: [
                'rgba(255, 55, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 55, 132, 1)',
            ],
            borderWidth: 1
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
    //ordini per anno
	var ctx = document.getElementById('ordiniPerAnno').getContext('2d');
    var ordiniPerAnno = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: orders_years_key,
        datasets: [{
            label: 'Ordini per anno',
            data: orders_years_value,
            backgroundColor: [
                'rgba(255, 55, 100, 0.2)',
            ],
            borderColor: [
                'rgba(255, 55, 100, 1)',
            ],
            borderWidth: 1
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
}
</script>

<div class="container">

    <div class="row">

        <div class="card p-3 d-inline mr-4">
            <span>Guadagni totali : </sp>
            <span><strong>{{$all_profit}} €</strong> </span>
        </div>
        <div class="card p-3 d-inline mr-4">
            <span>Ordini totali: </sp>
            <span><strong>{{$order_count}}</strong></span>
        </div>
        <div class="card p-3 d-inline mr-4">
            <span>Ordini di questo mese: </sp>
            <span><strong>{{$month_order}}</strong></span>
        </div>
        <div class="card p-3 d-inline mr-4">
            <span>Ordini di questo anno: </sp>
            <span><strong>{{$year_order}}</strong></span>
        </div>
    </div>
    <!-- Grafici -->

    <!-- ordine per mese -->
    <div class="row">
        <div class="col-6">
            <div>
                <canvas id="ordinePerMese"></canvas>
            </div>
        </div>

        <div class="col-6">
            <div>
                <canvas id="guadagniPerMese"></canvas>
            </div>
        </div>
    </div>
    <!-- guadagni per mese -->
    <div class="row">
    </div>
    <!-- guadagni per anno -->
    <div class="row">
        <div>
            <canvas id="guadagniPerAnno" width="800"></canvas>
        </div>
    </div>
    <!-- ordini per anno -->
    <div class="row">
        <div>
            <canvas id="ordiniPerAnno" width="800"></canvas>
        </div>
    </div>

</div>
    
    

    

@endsection
