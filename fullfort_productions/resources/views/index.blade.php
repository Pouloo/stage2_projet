

<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Nos Produits
        </h2>
      </div>
      <div class="row">
        @foreach ($products as $product)
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
              <a href="{{route('product.details', $product->id)}}">
                <div class="img-box">
                  <img src="{{asset('product_img/'.$product->image)}}" alt="">
                </div>
                <div class="detail-box">
                  <h6>{{$product->name}}</h6>
                  <h6>Price<span>&nbsp;{{$product->price}}€</span></h6>
                </div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
      <div class="btn-box">
        <a href="">
          Voir Tous Les Produits
        </a>
      </div>
    </div>
</section>