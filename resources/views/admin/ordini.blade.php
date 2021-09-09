@extends('layouts.admin')
@section('titolo')
    <h1>Lista Ordini</h1>
@endsection


@section('content')

        <table class="table table-striped">
            <thead>
              <tr>
                <th >N° Ord.</th>
                <th >Customer</th>
                <th >Status</th>
                <th >Price</th>
                <th >Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($orders as $order)

                {{-- {{ddd($order)}} --}}
                <tr>
                    <th scope="row">1</th>
                    <td>{{$order->customer_name}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->total_price}}</td>
                    <td><a href="{{route('admin.ordini.show', $order->id)}}" class="btn btn-success">View order</a></td>
                  </tr>
                @endforeach

              
              
            </tbody>
          </table>

@endsection
