@extends('layouts.app')

@section('content')

<cart-component></cart-component>

<form method="POST" action="{{ Route('checkout.pay') }}">
  @csrf
      <div class="text-center">
        <button type="submit" id="submit-button" class="button button--small button--green">Conferma e Paga</button>
      </div>
</form>
  
@endsection
