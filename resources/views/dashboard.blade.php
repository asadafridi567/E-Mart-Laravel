<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    <div class="navbar-container">
    @include('adminnavbar')
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="card">
                    <h3>Total Orders</h3>
                    <p>{{ $totalOrders }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card">
                    <h3>Total Revenue</h3>
                    <p>${{ $totalRevenue }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card">
                    <h3>Total Revenue This Month</h3>
                    <p>${{ $totalRevenueThisMonth }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <h3>Total Products</h3>
                    <p>{{ $totalProducts }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <h3>Total Users</h3>
                    <p>{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
