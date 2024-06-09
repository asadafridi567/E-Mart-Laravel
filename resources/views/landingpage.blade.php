<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sam's Mart</title>
    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function scrollToNewArrivals() {
            var element = document.getElementById("new-arrivals");
            element.scrollIntoView({ behavior: "smooth", block: "start" });
        }
    </script>
    
</head>
<body>
{{View::make('navbar')}}

    <div class="fixed-text">
        <h1><b>WELCOME TO SAMS MART</b></h1>
        <p>A multi branded store in Islamabad! Having a wide range of European and American Mens wear apparel!</p>
        <button onclick="scrollToNewArrivals()" class="btn btn-primary">SHOP NOW</button>
    </div>
<div class="carousel1">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('img/carousel1/image 1.png') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/carousel1/image 2.png') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/carousel1/image 3.png') }}" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>
    </div>

    <section id="new-arrivals" class="new-arrivals">
    <div class="container-fluid">
        <h2>NEW ARRIVALS</h2>

        <div class="row">
    @php
    $count = 0; // Initialize counter outside the loop
    @endphp

    @foreach($products as $index => $item)
        @php
        $count++; // Increment counter on each iteration
        @endphp

        @if ($count > 6) {{-- Exit the loop after displaying 6 items --}}
            @break;
        @endif

        <div class="col-md-4">
            <a href="detail/{{$item['id']}}">
                <div class="clothing-item">
                    <img src="{{ asset($item['gallery']) }}" alt="Clothing Item">
                    <h4>{{$item['name']}}</h4>
                    <div class="rating">★ ★ ★ ★ ☆</div>
                    <div class="price">${{$item['price']}}</div>
                </div>
            </a>
        </div>

        @if (($index + 1) % 3 == 0) {{-- Add a new row after every third item --}}
            </div>
            <div class="row">
        @endif
    @endforeach
</div>

    </div>
</section>

    <div class="carousel2">
        <h2>WHAT PEOPLE SAY ABOUT US</h2>
        <div class="container-fluid">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('img/carousel2/1.png') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/carousel2/2.png') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/carousel2/3.png') }}" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
        </div>
    </div>

    <section id="contact-us">
        <div class="container-fluid">
            <h2>CONTACT US</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <p>INQUIRY@SAMSMART.COM</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>HITEC University، Cantt، Taxila, Rawalpindi, Punjab 47080, Pakistan</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-info">
                        <i class="fas fa-phone"></i>
                        <p>051-5122813</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-info">
                        <i class="fas fa-globe"></i>
                        <p>WWW.HITECUNI.EDU.PK</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white text-dark py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="brand-logo d-flex align-items-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Brand Logo" class="me-2">
                        <h4 class="m-0"><b>Sam's </b>Mart</h4>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="social-icons">
                        <a href="#" ><i class="fab fa-facebook-f"></i></a>
                        <a href="#" ><i class="fab fa-instagram"></i></a>
                        <a href="#" ><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" ><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <div class="copyright">
                        <p class="m-0"> &copy; 2024 SAMSMART. ALL RTGHTS RESERVED.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
