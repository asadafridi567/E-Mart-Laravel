<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/add1.css') }}">
</head>
<body>
    <div class="wrapper">
        <div id="navbar-container">
            @include('adminnavbar') <!-- Include your navbar here -->
        </div>

        <div class="container">
            <h1>Edit User</h1>
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="password">User Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary btn-cancel" onclick="cancel()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function cancel() {
            alert("Cancelled!");
        }
    </script>
</body>
</html>
