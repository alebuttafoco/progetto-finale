<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail di Conferma</title>
</head>
<body>
    <h1>Email conferma ordine</h1>
    <div>
        <span><strong>Customer Name: </strong> {{$customer_name}}</span>
    </div>
    <div>
        <span><strong>Customer Lastname: </strong> {{$customer_lastname}}</span>
    </div>
    <div>
        <span><strong>Customer email: </strong> {{$customer_email}}</span>
    </div>
    <div>
        <span><strong>Customer phone: </strong> {{$customer_phone}}</span>
    </div>
    <div>
        <span><strong>Customer Address: </strong> {{$customer_address}}</span>
    </div>
    <div>
        <span><strong>Order date: </strong> {{$dateNow}}</span>
    </div>
    <div>
        <span><strong>Total Price: </strong> {{$total_price}}</span>
    </div>
    <div>
        @foreach ($orders as $order)
        <span><strong>Plate Name: </strong> {{$order->name}} x {{$order->qty}}</span> <br>
         {{-- <span><strong>Plate Name: </strong> {{$order->pivot->quantity}}</span> --}}
        @endforeach
    </div>

    <div>
        <h5>Restaurant</h5>
        <span><strong>Name: </strong> {{$restaurant->name}}</span> <br>
        <span><strong>Address: </strong> {{$restaurant->address}}</span> <br>
        <span><strong>Partita IVA: </strong> {{$restaurant->piva}}</span>
    </div> 
    
</body>
</html>