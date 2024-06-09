<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/adminnavbar.css') }}">
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('adminorders.index') }}">Orders</a></li>
                <li><a href="{{ route('adminproducts.index') }}">Products</a></li>
                <li><a href="{{ route('addProduct') }}">Add Product</a></li>
                <li><a href="{{ route('adminusers.index') }}">Users</a></li>
                <li><a href="adminlogout" ><span style="color: tomato;">Logout</span></a></li>
            </ul>
        </div>
        <div class="main-content">

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
