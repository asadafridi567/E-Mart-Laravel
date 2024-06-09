<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Shades</title>
    <link rel="stylesheet" href="{{ asset('css/description.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    {{View::make('navbar')}}

<div class="des-container">
    <div class="product-info">
        <div class="product-image">
            <img src="{{ asset($product['gallery']) }}" alt="Product Image">
        </div>
        <div class="product-details">
            <h2>{{$product['name']}}</h2>
            <p class="price">${{$product['price']}}</p>
            <p class="ship">Tax included. Shipping calculated at checkout.</p>
            <div class="line"></div>
            <div class="sizes">
                <p>Size</p>
                <input type="radio" id="size-s" name="size" value="S">
                <label for="size-s">S</label>
                <input type="radio" id="size-m" name="size" value="M">
                <label for="size-m">M</label>
                <input type="radio" id="size-l" name="size" value="L">
                <label for="size-l">L</label>
                <input type="radio" id="size-xl" name="size" value="XL">
                <label for="size-xl">XL</label>
            </div>

            @if($product['quantity'] > 0)
                <form action="/cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value={{$product['id']}}>
                    <div class="buttons">
                        <button class="add" id="add">Add to Cart</button>
                    </div>
                </form>
                <form action="/buynow/checkout" method="GET">
                @csrf
                <input type="hidden" name="product_id" value={{$product['id']}}>
                    <div class="buttons">
                        <button class="buy" id="buy" type="submit">Buy Now</button>
                    </div>
                </form>
            @else
            <br>
                <div class="out-of-stock">
                    <h3>Product Out of Stock</h3>
                    <p>Sorry, this product is currently out of stock. Please check back later or explore other options.</p>
                </div>
            @endif
        </div>
    </div>
    <div class="description">
        <h3>Description</h3>
        <p>{{$product['description']}} Crafted from premium cotton fabric, this shirt offers a lightweight and breathable feel, ensuring all-day comfort whether you're at work, out for a casual gathering, or simply relaxing at home. <br><br>

        With its timeless design and classic fit, our Casual Shirt pairs seamlessly with your favorite jeans for a laid-back look or can be dressed up with trousers for a more polished ensemble. The shirt features a button-down collar and adjustable cuffs, adding a touch of sophistication to its relaxed silhouette. Available in a range of sizes (S, M, L, XL) to suit every body type, our Casual Shirt offers a tailored fit that flatters without compromising on comfort. Choose from a variety of versatile colors to complement your personal style and effortlessly elevate your wardrobe.</p>
    </div>
    <div class="size-guide">
        <h3>Size Guide</h3>
        <p>Please refer to the following size chart for guidance:</p>
        <img src="{{ asset('img/sizeguide.PNG') }}">
    </div>
</div>
</body>
</html>
