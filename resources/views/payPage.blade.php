@extends('layouts.app')

@section('content')

<div class="container">


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
    
    <h1>pagina con carta </h1>
    <h2>totale: {{ $total }}</h2>
    
    
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
            <div class="form-group col-md-6 mb-3">
                <label for="customer_name">Nome:</label>
                <input type="text" class="form-control" name="customer_name" placeholder="Mario" value="{{ old('customer_name') }}" required>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="customer_name">Cognome:</label>
                <input type="text" class="form-control" name="customer_lastname" placeholder="Rossi" value="{{ old('customer_lastname') }}" required>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="customer_email">E-mail:</label>
                <input type="email" class="form-control" name="customer_email" placeholder="nomecognome@gmail.com" value="{{ old('customer_email') }}" required>
                <small id="emailHelp" class="form-text text-muted">Non condivideremo mai i tuoi dati con nessuno</small>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="customer_phone">Telefono:</label>
                <input type="tel" class="form-control" name="customer_phone" value="{{ old('customer_phone') }}" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Inserisci il tuo numero in questo formato: 123-456-7890" required>
                <small class="form-text text-muted">Assicurati che il numero di telefono rispetti il formato indicato</small>
            </div>
            <div class="form-group col-12 mb-3">
                <label for="customer_address">Indirizzo:</label>
                <input type="text" class="form-control" name="customer_address" placeholder="Inserisci l'indirizzo completo: via, città, CAP" value="{{ old('customer_address') }}" required>
                <small class="form-text text-muted">Ricordati di inserire l'indirizzo, la città e CAP</small>
            </div>
        </div>
      
    
    
    
    
        {{-- Parte carta di credito --}}
        <div class="bt-drop-in-wrapper">
            <div id="bt-dropin"></div>
        </div>
    
        <input id="nonce" name="payment_method_nonce" type="hidden">
    
        <div class="d-flex justify-content-between">
          <button class="btn btn-sm btn-success" type="submit"><span>Effettua il pagamento</span></button>
        </div>
    </form>
    
    
    
    <script>
    document.getElementById('total').value = localStorage.getItem('totalPrice');
    document.getElementById('inputOrder').value =localStorage.getItem('plates');
    </script>
</div>



@endsection
