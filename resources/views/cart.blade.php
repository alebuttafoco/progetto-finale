@extends('layouts.app')

@section('content')

<cart-component></cart-component>

<div class="container">
    <div class="d-flex justify-content-center">
        <form method="POST" action="{{ Route('checkout.pay') }}">
          @csrf
          <div class="form-row">
              
              <div class="form-group col-12 mt-3 mb-0">
                  <button type="submit" class="btn btn-primary">Prosegui col pagamento</button>
              </div>
          </div>
        </form>

    </div>
</div>

@endsection
