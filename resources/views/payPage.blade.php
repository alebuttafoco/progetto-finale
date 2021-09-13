@extends('layouts.app')

@section('content')

<div class="container my-5">


    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    {{-- <h1>pagina con carta </h1> --}}
    {{-- <h2>totale: {{ $total }}</h2> --}}
    <h2 class="text-center pb-2 border-bottom"> Inserisci i tuoi dati e procedi al pagamento </h2>
    

    <form method="POST" id="payment-form" action="{{ url('/pay') }}">
        
        @csrf
        <div class="input-wrapper amount-wrapper">
            <input id="total" name="total" type="hidden">
            <input id="inputOrder" name="inputOrder" type="hidden">
            <input id="dateNow" name="dateNow" type="hidden" value="{{Carbon\Carbon::now()}}">
            <input id="status" name="status" type="hidden" value="completato">
            

            <input id="token" name="token" type="hidden" value="{{ $token }}">
    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 mb-0">
                <label for="customer_name">Nome</label>
                <input onkeyup="manage(this)" type="text" class="check_value form-control" name="customer_name" placeholder="Nome" value="{{ old('customer_name') }}" required>
            </div>
            <div class="form-group col-md-6 mb-0">
                <label for="customer_name">Cognome</label>
                <input onkeyup="manage(this)" type="text" class="check_value form-control" name="customer_lastname" placeholder="Cognome" value="{{ old('customer_lastname') }}" required>
            </div>
            <div class="form-group col-md-6 mb-0">
                <label for="customer_email">Email</label>
                <input onkeyup="manage(this)" type="email" class="check_value form-control" name="customer_email" placeholder="Email" value="{{ old('customer_email') }}" required>
            </div>
            <div class="form-group col-12 mb-0">
                <label for="customer_address">Indirizzo</label>
                <input onkeyup="manage(this)" type="text" class="check_value form-control" name="customer_address" placeholder="Indirizzo" value="{{ old('customer_address') }}" required>
            </div>
            <div class="form-group col-12 mb-0">
                <label for="customer_phone">Telefono</label>
                <input onkeyup="manage(this)" type="number" class="check_value form-control" name="customer_phone" placeholder="Telefono" value="{{ old('customer_phone') }}" pattern="[0-9]+" required>
            </div>
        </div>
          
        
        {{-- Parte carta di credito --}}
        <div class="bt-drop-in-wrapper">
            <div id="bt-dropin"></div>
        </div>
    
        <input id="nonce" name="payment_method_nonce" type="hidden">
    
        <div class="text-center">
          <input disabled id="btn_pay" class="btn btn-success" data-toggle="modal" data-target="#loading" type="submit" value="Effettua il pagamento">
        </div>
    
    </form>

    <!-- Modal -->
    <div class="modal fade text-white" id="loading" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-center">
                <i class="fas fa-spinner mb-4"></i>
                <div>PAGAMENTO IN CORSO</div>
            </div>
        </div>
    </div>


        
    <script type="text/javascript">

    document.getElementById('total').value = localStorage.getItem('totalPrice');
    document.getElementById('inputOrder').value = localStorage.getItem('plates');

    function manage(txt) {
        var inputs = document.getElementsByClassName('check_value');

        var bt = document.getElementById('btn_pay');

        for (let i = 0; i < inputs.length; i++) {

             if (inputs[i].value != '') {
                bt.disabled = false;
            }
            else {
                bt.disabled = true;
            }
        }
    }

    </script>

</div>


@endsection
