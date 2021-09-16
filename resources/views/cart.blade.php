@extends('layouts.app')

@section('content')

<cart-component></cart-component>

<form method="POST" action="{{ Route('checkout.pay') }}">
  @csrf
      <div id="button-box" class="text-center">
        <button type="submit" id="submit-button" class="button button--small button--green mb-5">Conferma e Paga</button>
      </div>
</form>



<script>
window.setInterval(function(){
  plates = JSON.parse(localStorage.getItem("plates"));
  if (plates.length == 0) {
    document.getElementById("button-box").style.display = 'none';
    window.history.back();
  }
}, 500);


</script>
  
@endsection
