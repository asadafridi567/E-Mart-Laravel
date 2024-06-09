<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
{{View::make('navbar')}}

    <div class="content">
       <div class="card">
        <h2>My Orders</h2>
        @foreach ($orders as $order)
        <div class="item-row">
            <img class="item-image" src="{{ asset($order->gallery) }}" alt="Product Image">
        <div class="item-details">
        <div class="item-title">{{ $order->product_name }}</div>
        <div class="item-price">${{ $order->price }}</div>
        <div class="item-size"><b>Size:</b> {{ $order->size }}</div>
        <div class="item-quantity">
            <p class="qt">Qty:</p>
            <p class="quantity">{{ $order->quantity }}</p>
        </div>
        <div class="payment">
            <p class="status">Date:</p>
            <p class="stat">{{ $order->created_at}}</p>
        </div>  
        <div class="Delivery">
            <p class="status">Delivery Status:</p>
            <p class="stat">Processing</p>
        </div>   
    </div>
</div>
<div class="line"></div>
@endforeach
    
</body>
</html>