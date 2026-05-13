<!-- Affichage des produits avec le meilleur score -->
@extends('design')

@section('products_best')

    <div class="container">
		<div class="heading_container heading_center">
			<h2>Nos Meilleurs Produits</h2>
		</div>
		<div class="row">
			@foreach ($products_best as $product)
                @if ($product->score != 0)
                    <div class="col-sm-6 col-md-4 col-lg-3" style="display: block; margin: auto;">
                        <div class="box hover-overlay" style="border-radius: 25px; background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);">
                            <!-- → Redirection vers vue details produits -->
                            <a href="{{route('product.details', $product->id)}}" style="background-color: rgb(238, 238, 238); color: black;">
                                <div class="img-box" style="padding-bottom: 0;">
                                    <img src="{{asset('product_img/'.$product->image)}}">
                                </div>
                                <div class="detail-box">
                                        {{$product->name}}<br><br>
                                        Prix: {{$product->price}}€<br>
                                        @if ($product->quantity != 0)
                                            Quantité: ×{{$product->quantity}}<br>
                                        @else
                                            Quantité: En Rupture<br>
                                        @endif
                                            Score: {{$product->score}}
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
			@endforeach
		</div>
		<div class="btn-box">
			<a href="{{route('index')}}">Voir Les Derniers Produits</a>
		</div>
        <div class="btn-box">
			<a href="{{route('products.all')}}">Voir Tous Les Produits</a>
		</div>
	</div>

@endsection