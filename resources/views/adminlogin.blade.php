<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/adminlogin.css') }}">
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2>Admin Login</h2>
            <form class="login-form" method="POST" action="/adminlogin">
            @csrf
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            </form>

        </div>
    </div>
</body>
</html>
