@extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
    <img src="https://www.foodmerica.com/images/Courier_2x.gif" alt="" style="height: 360px; width: 280px">
    <h2>Il tuo ordine è stato confermato!</h2>
    <h3>A breve le arriverà una mail di conferma</h3>
    <h3>Grazie e al prossimo ordine!</h3>
    <a href="/" class="btn btn-primary mt-5">Torna alla Homepage</a>
</div>



<script>
    localStorage.clear();
</script>
@endsection