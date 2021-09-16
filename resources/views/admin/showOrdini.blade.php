@extends('layouts.admin')
@section('titolo')
    <h1>Riepilogo Ordine</h1>
@endsection


@section('content')

<div class="w-100 border">
  {{-- dati ordine --}}
  <h3 class="bg-primary p-2">Dati Ordine</h3>
  <table class="table table-striped">
    <tbody>
      <tr>
        <th class="w-50">Nome cliente</th>
        <td>{{$order->customer_name}}</td>
      </tr>
  
      <tr>
        <th>Cognome cliente</th>
        <td>{{$order->customer_lastname}}</td>
      </tr>
  
      <tr>
        <th>Indirizzo cliente</th>
        <td>{{$order->customer_address}}</td>
      </tr>
  
      <tr>
        <th>Stato ordine</th>
        <td>{{$order->status}}</td>
      </tr>
  
      <tr>
        <th>Data ordine</th>
        <td>{{$order->date}}</td>
      </tr>
  
      <tr>
        <th>Prezzo totale</th>
        <td>{{$order->total_price}} €</td>
      </tr>
    </tbody>
  </table>
  
  {{-- piatti ordinati --}}
  <h3 class="bg-primary p-2">Piatti Ordinati</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="w-50">Piatto ordinato</th>
        <th>Quantità</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($order->plates as $plate)
      <tr>
        <td>{{$plate->name}}</td>
        <td>{{$plate->pivot->quantity}}</td>
      </tr>
        @endforeach
    </tbody>

  </table>
</div>

@endsection
