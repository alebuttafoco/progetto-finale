@extends('layouts.admin')
@section('titolo')
    <h1>Lista Ordini</h1>
@endsection


@section('content')

  <table class="table table-striped">
      <thead>
        <tr class="text-center">
          <th >ID Ord.</th>
          <th >Customer</th>
          <th >Status</th>
          <th >Price</th>
          <th >Action</th>
        </tr>
      </thead>

      <tbody>
        {{-- {{ddd($orders)}} --}}
          @foreach ($orders as $order)

          {{-- {{ddd($order)}} --}}
          <tr class="text-center">
              <th>{{$order->id}}</th>
              <td>{{$order->customer_name}}</td>
              <td>{{$order->status}}</td>
              <td>{{$order->total_price}}</td>
              <td><a href="{{route('admin.ordini.show', $order->id)}}" class="btn btn-success">View order</a></td>
          </tr>
          @endforeach  
      </tbody>
  </table>
  {{$orders->links()}}

@endsection
