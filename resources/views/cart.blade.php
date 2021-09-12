@extends('layouts.app')

@section('content')

<cart-component></cart-component>

<!-- FORM DATI UTENTE -->
<div class="container">
    {{-- devo passargli l'id del ristorante --}}
    <form method="POST" action="{{ Route('checkout.pay', 1) }}">
      @csrf
      <!-- customer_name -->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"
          >Customer Name</label
        >
        <input
          type="text"
          class="form-control"
          id="customer_name"
          name="customer_name"
          aria-describedby="emailHelp"
        />
      </div>

      <!-- customer_address -->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"
          >Customer lastName</label
        >
        <input
          type="text"
          class="form-control"
          id="customer_lastname"
          name="customer_lastname"
          aria-describedby="emailHelp"
        />
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"
          >Customer Address</label
        >
        <input
          type="text"
          class="form-control"
          id="customer_address"
          name="customer_address"
          aria-describedby="emailHelp"
        />
      </div>

      <!-- customer_email -->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"
          >Customer Email</label
        >
        <input
          type="email"
          class="form-control"
          id="customer_email"
          name="customer_email"
          aria-describedby="emailHelp"
        />
      </div>

      {{-- Qui dovro andare a inserire sia il totale dell'ordine che il contenuto dell'ordine --}}
      <input type="hidden" name="total" :value="100" />

      <button type="submit" class="btn btn-primary">vai al pagamento</button>
    </form>
  </div>

@endsection
