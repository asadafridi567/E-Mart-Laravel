<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/products1.css') }}">
</head>
<body>
<div class="wrapper">
    <div class="navbar-container">
        @include('adminnavbar')
    </div>
    <div class="container">
        <h1>Products</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="clothing-item">
                        <img src="{{ asset($product->gallery) }}" alt="Clothing Item">
                        <h4>{{ $product->name }}</h4>
                        <div class="rating">★ ★ ★ ★ ☆</div>
                        <div class="price">${{ $product->price }}</div>
                        <div class="actions">
                            <a href="{{ route('adminproducts.edit', $product->id) }}"><button class="btn btn-primary">Edit</button></a>
                            <form action="{{ route('adminproducts.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @if ($loop->iteration % 3 == 0 && !$loop->last)
        </div>
        <div class="row">
                @endif
            @endforeach
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    fetch('navbar.html')
        .then(response => response.text())
        .then(html => {
            document.getElementById('navbar-container').innerHTML = html;
        });
</script>

</body>
</html>
