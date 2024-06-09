<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/add1.css') }}">
</head>
<body>
    <div class="wrapper">
        <div id="navbar-container">
            @include('adminnavbar') <!-- Include the navbar partial -->
        </div>

        <div class="container">
            <h1>Edit Product</h1>
            <form action="{{ route('adminproducts.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="name" value="{{ $product->name }}" required>
                </div>
                <div class="form-group">
                    <label for="productPrice">Price</label>
                    <input type="number" class="form-control" id="productPrice" name="price" value="{{ $product->price }}" required>
                </div>
                <div class="form-group">
                    <label for="productDescription">Description</label>
                    <textarea class="form-control" id="productDescription" name="description" rows="4" required>{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="productCategory">Category</label>
                    <select class="form-select" id="productCategory" name="category" required>
                        <option value="" disabled>Select Category</option>
                        <option value="Shirts" {{ $product->category == 'Shirts' ? 'selected' : '' }}>Shirts</option>
                        <option value="Jackets" {{ $product->category == 'Jackets' ? 'selected' : '' }}>Jackets</option>
                        <option value="Watches" {{ $product->category == 'Watches' ? 'selected' : '' }}>Watches</option>
                        <option value="Glasses" {{ $product->category == 'Glasses' ? 'selected' : '' }}>Glasses</option>
                        <option value="Shoes" {{ $product->category == 'Shoes' ? 'selected' : '' }}>Shoes</option>
                        <option value="Jeans" {{ $product->category == 'Jeans' ? 'selected' : '' }}>Jeans</option>
                    </select>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary btn-cancel" onclick="cancel()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function cancel() {
            alert("Cancelled!");
        }
    </script>
</body>
</html>
