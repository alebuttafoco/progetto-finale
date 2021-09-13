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
          <button type="submit" class="btn btn-primary">Prosegui col pagamento</button>
      </div>
  </div>
</form>

@endsection
