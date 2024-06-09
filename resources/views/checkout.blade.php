<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
{{View::make('navbar')}}

<div class="container">
    <div class="shipping-details">
        <h2><u>Shipping Details</u></h2>
        <form method="POST" action="/checkout">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">First Name*</label>
                    <input type="text" id="firstName" name="firstName" required placeholder="Enter your FirstName">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name*</label>
                    <input type="text" id="lastName" name="lastName" required placeholder="Enter your LastName">
                </div>
            </div>
            <div class="form-row">
            <div class="form-group">
                <label for="address">Address*</label>
                <input type="text" id="address" name="address" required placeholder="Full Address">
            </div>
            <div class="form-group">
                <label for="aptSuite">Apt,Suite*</label>
                <input type="text" id="aptSuite" name="aptSuite" placeholder="Apt">
            </div>
        </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="city">City*</label>
                    <input type="text" id="city" name="city" required placeholder="Islamabad">
                </div>
                <div class="form-group">
                    <label for="country">Country*</label>
                    <input type="text" id="country" name="country" required placeholder="Pakistan">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="number">Mobile Number*</label>
                    <input type="text" id="number" name="number" required placeholder="+92XXXXXXXXXX">
                </div>
                <div class="form-group">
                    <label for="code">Postal Code*</label>
                    <input type="text" id="code" name="code" required placeholder="Enter Code">
                </div>
            </div>
            <button class="checkout-btn" type="submit">Checkout</button>
        </form>
    </div>
    
    <div class="order-summary">
        <h2>Your Order</h2>
        <div class="line"></div>
        @foreach($products as $item)
        <div class="order-item">
        <img src="{{ asset($item->gallery) }}" alt="Product Image">
        <div class="details">
        <h3>{{ $item->name }} <span class="size">{{ $item->size }}</span></h3>
        <p>${{ $item->price }}</p>
                <div class="quantity">
                    <button class="minus">-</button>
                    <input type="text" class="quantity-input" value="1">
                    <button class="plus">+</button>
                    <a href=""><button class="remove"><i class="fas fa-trash"></i></button></a>
                </div>
            </div>   
        </div>
        <div class="line">
        @endforeach
        </div>

        <div class="totals">
            <p>Delivery: $5.00</p>
            <p>Discount: -$2.00</p>
            <div class="line"></div>
            <h3>$ {{$total+5-2}}</h3>
        </div>
        
       
    </div>
</div>

</body>
</html>