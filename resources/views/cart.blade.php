@extends('layouts.app')

@section('content')

<cart-component></cart-component>

<form id="form" method="POST" action="{{ Route('checkout.pay') }}">
  @csrf
      <div id="button-div" class="text-center mb-5">
        <button type="submit" id="submit-button" class="button button--small button--green">Conferma e Paga</button>
      </div>
</form>

<script>
  //va a controllare se il carello e vuoto fa sparire il pulsante
  window.setInterval(function(){
    plates = JSON.parse(localStorage.getItem("plates"));
    if (plates.length == 0) {
      document.getElementById('button-div').style.display = 'none';
      window.location.href = "./"
    }
}, 500);

</script>
  
@endsection
