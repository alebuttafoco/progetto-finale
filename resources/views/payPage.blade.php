@extends('layouts.app')

@section('content')
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



{{-- 
<form method="POST" id="payment-form" action="{{ url('/pay') }}">
    @csrf
    <div class="input-wrapper amount-wrapper">
        <input id="amount" name="amount" type="hidden" min="1" placeholder="Amount" value="{{ $total }}">
    </div>
  
    <div class="bt-drop-in-wrapper">
        <div id="bt-dropin"></div>
    </div>

    <textarea name="order_data" id="order_data" hidden value=""></textarea>
    <input id="nonce" name="payment_method_nonce" type="hidden" />

    
    <div class="d-flex justify-content-between">
     
      <button class="btn btn-sm btn-success" type="submit"><span>Effettua il pagamento</span></button>
    </div>
</form> --}}

<form method="POST" id="payment-form" action="{{ url('/pay') }}">
    @csrf
    <div class="input-wrapper amount-wrapper">
        <input id="amount" name="amount" type="hidden" min="1" placeholder="Amount" value="{{ $total }}">
        <input id="token" name="token" type="hidden" value="{{ $token }}">
    </div>
  
    <div class="bt-drop-in-wrapper">
        <div id="bt-dropin"></div>
    </div>
    
    {{-- <textarea name="order" id="order" hidden cols="30" rows="10">{{ json_encode($order) }}</textarea> --}}
    <textarea name="order_data" id="order_data" hidden value=""></textarea>

    <input id="nonce" name="payment_method_nonce" type="hidden">
    <input type="hidden" name="restaurant_id" value="1">

    <div class="d-flex justify-content-between">
      
      <button class="btn btn-sm btn-success" type="submit"><span>Effettua il pagamento</span></button>
    </div>
</form>





@endsection
