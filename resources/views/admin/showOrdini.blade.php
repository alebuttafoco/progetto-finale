@extends('layouts.admin')
@section('titolo')
    <h1>Riepilogo Ordine</h1>
@endsection


@section('content')


<div>
  <span><strong>Customer name: </strong></span>
  <span>{{$order->customer_name}}</span>
<div>
  <div>
    <span><strong>Customer Lastname: </strong></span>
    <span>{{$order->customer_lastname}}</span>
  <div>
    <div>
      <span><strong>Customer Address: </strong></span>
      <span>{{$order->customer_address}}</span>
    <div>
      <div>
        <span><strong>Order status: </strong></span>
        <span>{{$order->status}}</span>
      <div>
        <div>
          <span><strong>Order Date: </strong></span>
          <span>{{$order->date}}</span>
        <div>
          <div>
            <span><strong>order total Price: </strong></span>
            <span>{{$order->total_price}}</span>
          <div>
            <br>
            <br>
            <br>
  <h5>Lista Piatti</h5>
  @foreach ($order->plates as $plate)
      <p>{{$plate->name}} x {{$plate->pivot->quantity}}</p>
  @endforeach
</div>

</div>
        
@endsection
