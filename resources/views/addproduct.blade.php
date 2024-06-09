<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/add1.css') }}">
</head>
<body>

<div class="wrapper">
    <div class="navbar-container">
        @include('adminnavbar')
    </div>
    <div class="container">
        <h1>Add Product</h1>
        <form method="POST" action="{{ route('adminproducts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="productImage">Product Image</label>
                <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="productPrice">Price</label>
                <input type="number" placeholder="1.00" step="0.01" min="0" max="100" class="form-control" id="productPrice" name="productPrice" required>
            </div>
            <div class="form-group">
                <label for="productSize">Size</label>
                <input type="text" class="form-control" id="productSize" name="productSize" required>
            </div>
            <div class="form-group">
                <label for="productCategory">Category</label>
                <select class="form-select" id="productCategory" name="productCategory" required>
                    <option value="" selected disabled>Select Category</option>
                    <option value="Shirts">Shirts</option>
                    <option value="Jackets">Jackets</option>
                    <option value="Watches">Watches</option>
                    <option value="Glasses">Glasses</option>
                    <option value="Shoes">Shoes</option>
                    <option value="Jeans">Jeans</option>
                </select>
            </div>
            <div class="form-group">
                <label for="productDescription">Description</label>
                <textarea class="form-control" id="productDescription" name="productDescription" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary btn-cancel" onclick="cancel()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    fetch('navbar.html')
        .then(response => response.text())
        .then(html => {
            document.getElementById('navbar-container').innerHTML = html;
        });
</script>
<script>
    function cancel() {
        alert("Cancelled!");
    }
</script>
</body>
</html>
