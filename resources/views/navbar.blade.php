<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sam's Mart</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <div class="container-fluid">
            <div class="search-card" id="searchCard">
                <div class="search-header">
                    <h5>WHAT ARE YOU LOOKING FOR?</h5>
                    <i class="fas fa-times close-icon" onclick="closeSearch()"></i>
                </div>
                <form action="/search">
                <div class="search-input">
                    <input type="text" name="query" placeholder="Search Here">
                </div>
                </form>
            </div>
        </div>

        <div class="nav-container" id="navbar">
            <div class="logo">
                <a href="{{ url('landingpage') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="Sam's Mart Logo">
                    <span><b>Sam's</b> Mart</span>
                </a>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="{{ url('landingpage') }}">Home</a></li>
                    <li><a href="{{ url('shirts') }}">Shirt</a></li>
                    <li><a href="{{ url('jackets') }}">Jackets</a></li>
                    <li><a href="{{ url('glasses') }}">Glasses</a></li>
                    <li><a href="{{ url('jeans') }}">Jeans</a></li>
                    <li><a href="{{ url('shoes') }}">Shoes</a></li>
                    <li><a href="{{ url('watches') }}">Watches</a></li>
                </ul>
            </nav>
            <div class="icons">
            <i class="fas fa-search" id="searchIcon" onclick="openSearch()"></i>
                @if(Session::has('user'))
                <a href="{{ url('cart') }}"><i class="fas fa-shopping-cart"></i></a>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" onclick="toggleDropdown()" style="font-size: large;">
                    </button>
                <ul class="dropdown-menu" id="dropdownMenu">
                    <li><a class="dropdown-item" href="/orders">My Orders</a></li>
                    <li><a class="dropdown-item" href="logout" style="color: red;">Logout</a></li>
                </ul>
                </div>

                @else
                <a href="{{ url('login') }}"><i class="fas fa-user" ></i></a>
                @endif
            </div>
                
        </div>
        <div class="header-line" id="line"></div>
        <script src="{{ asset('js/search.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </header>

</body>
</html>
