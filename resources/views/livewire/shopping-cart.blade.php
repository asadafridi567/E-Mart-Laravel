<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    @include('navbar')

    <br><br><br>

    <div class="content">
        <div class="card">
            @if($products->isEmpty())
                <div class="empty-cart">
                    <h3>Your cart is empty</h3>
                    <p>Looks like you haven't added anything to your cart yet.</p>
                    <a href="/landingpage" class="btn btn-primary">Start Shopping</a>
                </div>
            @else
                @foreach($products as $item)
                    <div class="item-row">
                        <input type="checkbox" class="check">
                        <a href="detail/{{$item->id}}">
                            <img class="item-image" src="{{$item->gallery}}" alt="Product Image">
                        </a>

                        <div class="item-details">
                            <div class="item-title">{{$item->name}}</div>
                            <div class="item-price" data-price="{{$item->price}}">${{$item->price}}</div>
                            <div class="item-size"><b>{{$item->size}}</b></div>
                            <div class="item-quantity">
                                <button class="btn minus" wire:click="decreaseQuantity({{$item->id}})">-</button>
                                <input type="text" class="quantity-input" wire:model.defer="quantity.{{$item->id}}">
                                <button class="btn plus" wire:click="increaseQuantity({{$item->id}})">+</button>
                            </div>
                        </div>
                        <a href="/removecart/{{$item->cart_id}}"><i class="fas fa-trash remove-item"></i></a>
                    </div>
                    <div class="line"></div>
                @endforeach
            @endif
        </div>

        <div class="order-summary">
            <h2>Order Summary</h2>
            <div class="order-summary-item">Subtotal: <span id="subtotal" class="total">{{ $subtotal }}</span></div>
            <div class="order-summary-item">Shipping Fee: <span id="shipping-fee" class="total">{{ $shippingFee }}</span></div>
            <div class="order-summary-item">
                <input type="text" placeholder="Enter Voucher Code">
                <button type="button" class="apply">Apply</button>
            </div>
            <div class="order-summary-item"><b>Total:</b> <span id="total" class="total"><b>{{ $total }}</b></span></div>
            <a href="/checkout"><button class="checkout-btn" {{ $products->isEmpty() ? 'disabled' : '' }}>Proceed to Checkout</button></a>
        </div>
    </div>

    <script src="{{ asset('js/new.js') }}"></script>
    
</body>
</html>
