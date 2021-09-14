@extends('layouts.app')

@section('content')

<cart-component></cart-component>

<form method="POST" action="{{ Route('checkout.pay') }}">
  @csrf
  <div class="form-row">
      {{-- <div class="form-group col-md-6 mb-0">
          <label for="customer_name">Nome completo</label>
          <input type="text" class="form-control" name="customer_name" placeholder="Nome completo" value="{{ old('customer_name') }}" required>
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
      <div class="form-group col-12 mb-0">
          <label for="notes">Note</label>
          <textarea type="text" class="form-control" name="notes" rows="4">{{ old('notes') }}</textarea>
      </div> --}}
      <div class="form-group col-12 mt-3 mb-0">
        <button type="submit" id="submit-button" class="button button--small button--green">Conferma e Paga</button>
      </div>
  </div>
</form>
{{-- <form action="{{ Route('controllo.post') }}" method="post">
    @csrf
    @method("POST") <!-- VERIFICARE LA ROTTA DEL METODO POST -->
    <ul>
        <li>
          <label for="firstName">Nome:</label>
          <input type="text" id="firstName" name="firstName" required placeholder="" value="{{ old('firstName') }}">
        </li>
        <li>
          <label for="lastName"></label>
          <input type="text" id="lastName" name="lastName" required placeholder="Rossi" value="{{ old('lastName') }}"> 
        </li>
        <li>
          <label for="phone">Telefono:</label>
          <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required placeholder="333-444-5678" value="{{ old('phone') }}"><br> <!-- rivedere il pattern del numero di telefono -->
          <small>Formato: 123-456-7890</small>
        </li>
        <li>
          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" required placeholder="nomecognome@gmail.com" value="{{ old('email') }}"> 
          <small id="emailHelp" class="form-text text-muted">Non condivideremo mai i tuoi dati con nessuno.</small>
        </li>
    </ul>
    <ul>
        <li>
            <label for="streetAddress">Indirizzo:</label>
            <input type="text" id="streetAddress" name="streetAddress" required placeholder="Indirizzo" value="{{ old('streetAddress') }}"> 
        </li>
        <li>
            <label for="locality">Località:</label>
            <input type="text" id="locality" name="locality" required value="{{ old('locality') }}" placeholder="Città">
        </li>
        <li>
            <label for="postalCode">CAP:</label>
            <input id="postalCode" name="postalCode" type="text" pattern="[0-9]*" minlength="5" maxlength="5" required placeholder="CAP">
        </li>
    </ul>
        
    
    <!-- <input type="submit" value="INVIA"> -->
    <button type="submit" id="submit-button" class="button button--small button--green">Conferma e Paga</button>
</form> --}}

@endsection
