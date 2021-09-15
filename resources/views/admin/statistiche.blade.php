@extends('layouts.admin')
@section('titolo')
<h1>Dati del tuo Ristorante</h1>
    
@endsection



@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">

window.onload = function () {
    //ordini per mese
	var ctx = document.getElementById('ordinePerMese').getContext('2d');
    var ordinePerMese = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
        datasets: [{
            label: '# ordini per mese',
            data: [12, 19, 3, 5, 2, 3,1,2,3,4,5,6],
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
            label: '# guadagni per mese',
            data: [1100, 1900, 300, 500, 200, 300,100,200,300,400,500,600],
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
        labels: ['2019','2020', '2021'],
        datasets: [{
            label: '# guadagni per anno',
            data: [12123, 15534, 18645,],
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
        labels: ['2019','2020', '2021'],
        datasets: [{
            label: '# ordini per anno',
            data: [7564, 9263, 12431,],
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
    <!-- Grafici -->

    <!-- ordine per mese -->
    <div class="row">
        <div>
            <canvas id="ordinePerMese" width="800"></canvas>
        </div>
    </div>
    <!-- guadagni per mese -->
    <div class="row">
        <div>
            <canvas id="guadagniPerMese" width="800"></canvas>
        </div>
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

    <!-- Numeri -->
    <div class="row">
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
    </div>
</div>
    
    

    

@endsection
