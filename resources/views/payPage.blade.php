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
            <div class="form-group col-md-6 mb-0">
                <label for="customer_name">Name</label>
                <input type="text" class="form-control" name="customer_name" placeholder="Name" value="{{ old('customer_name') }}" required>
            </div>
            <div class="form-group col-md-6 mb-0">
                <label for="customer_name">lastname</label>
                <input type="text" class="form-control" name="customer_lastname" placeholder="Lastname" value="{{ old('customer_lastname') }}" required>
            </div>
            <div class="form-group col-md-6 mb-0">
                <label for="customer_email">Email</label>
                <input type="email" class="form-control" name="customer_email" placeholder="Email" value="{{ old('customer_email') }}" required>
            </div>
            <div class="form-group col-12 mb-0">
                <label for="customer_address">Indirizzo</label>
                <input type="text" class="form-control" name="customer_address" placeholder="Indirizzo" value="{{ old('customer_address') }}" required>
            </div>
            <div class="form-group col-12 mb-0">
                <label for="customer_phone">Telefono</label>
                <input type="number" class="form-control" name="customer_phone" placeholder="Telefono" value="{{ old('customer_phone') }}" pattern="[0-9]+" required>
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
