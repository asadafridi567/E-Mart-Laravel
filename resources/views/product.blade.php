<section id="new-arrivals" class="new-arrivals">
      <div class="na-container">
          <h2>NEW ARRIVALS</h2>
          @foreach($products as $item)
          <div class="row">
              <div class="col-md-4">
                <a href="detail/{{$item['id']}}">
                  <div class="clothing-item">
                      <img src="{{$item['gallery']}}" alt="Clothing Item">
                      <h4>{{$item['name']}}</h4>
                      <div class="rating">★ ★ ★ ★ ☆</div>
                      <div class="price">{{$item['price']}}</div>
                  </div>
                </a>
              </div>
            @endforeach
        </div>
    </section>