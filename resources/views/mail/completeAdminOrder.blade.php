<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail di Conferma</title>

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
          body {
            background-color: #F8B735;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            max-width: 800px;
            width: 100%;
            margin: auto;
            padding-bottom: 5rem
        }

        .logo {
            width: 100%;
            display: flex;
            justify-content: center;
            align-content: center;
        }
        .logo:nth-of-type(2){
            margin-top: 5rem;
        }

        .logo img {
            height: 80px;
        } 

        .logo h2 {
            font-size: 4rem;
        }

        hr {
            height: 2px;
            background-color: #252525;
        }

        .customer {
            text-align: center;
            padding: 2rem;
        }
        .customer span{
            margin: 1rem 0;
        }

        .linea {
            padding: 0.5rem 4rem;
            border-bottom: 1px solid #252525;
            display: flex;
            justify-content: space-between;
        }

        .linea:first-of-type{
            margin-top: 2rem;
        }

        .price {
            padding-top: 2rem;
            text-align: end;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .order{
            margin-top: 2rem;
        }
    </style>
</head>
<body>

   
    <div class="container">
        <div class="logo">
            <img src="{{ asset('img/logo_secondary.png') }}" alt="Logo DeliveBoo">
        </div>
        <div class="logo">
            <img src="{{ asset('img/check.png') }}" alt="Logo DeliveBoo">
        </div>
        <div class="logo">
            <h2>Have a new order!</h2>
        </div>
        <hr>

        <div class="customer">
            <h3>Customer details:</h3>
            <span>{{$customer_name}}</span>
            <span> {{$customer_lastname}}</span>
            <br>
            <span> {{$customer_email}}</span>
            <br>
            <span> {{$customer_address}}</span>
            <br>
            <span> {{$customer_phone}}</span>
        </div>

        <hr>

        <div class="restauran">
            <h4>From:</h4>
            <i class="fas fa-utensils"></i>
            <span>{{$restaurant->name}}</span>,
            <br>
            <span>Partita IVA: {{$restaurant->piva}}</span>
        </div>

        <div class="order">
            <h2>Order details</h2>
            <span><strong>Order date: </strong> {{$dateNow}}</span>

            @foreach ($orders as $order)

            <div class="linea">
                <span><strong>{{$order->qty}} x </strong> {{$order->name}}</span>
                <span> <strong>{{$order->qty * $order->price}} €</strong></span>
            </div>
            @endforeach
        </div>
        <div class="price">
            <span>Total</span>
            <span>{{$total_price}} €</span>

        </div>




    </div>



</body>
</html>