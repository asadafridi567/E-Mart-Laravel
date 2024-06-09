<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watches</title>
    <link rel="stylesheet" href="{{ asset('css/catalogue.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
{{View::make('navbar')}}

<section id="catalogue" class="catalogue">
    <div class="na-container">
        <div class="row">
        @foreach($products as $index => $item)
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
</section>
</body>
</html>