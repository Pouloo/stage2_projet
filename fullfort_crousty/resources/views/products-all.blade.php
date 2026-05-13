<!-- Affichage de tous les produits disponibles -->
@extends('design')

@section('products_all')

    <div class="container">
		<div class="heading_container heading_center">
			<h2>Nos Produits</h2>
		</div>
		<div class="row">
			@foreach ($products as $product)
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="box hover-overlay" style="border-radius: 25px;">
						<!-- → Redirection vers vue details produits -->
						<a href="{{route('product.details', $product->id)}}" style="background-color: rgb(238, 238, 238); color: black;">
							<div class="img-box" style="padding-bottom: 0;">
								<img src="{{asset('product_img/'.$product->image)}}">
							</div>
							<div class="detail-box">
								{{$product->name}}<br><br>
								Prix: {{$product->price}}€<br>
								@if ($product->quantity != 0)
									Quantité: ×{{$product->quantity}}
								@else
									Quantité: En Rupture
								@endif
							</div>
						</a>
					</div>
				</div>
			@endforeach
		</div>
		<div class="btn-box">
			<a href="{{route('index')}}">Voir Les Derniers Produits</a>
		</div>
		<div class="heading_container heading_center" style="margin-top: 50px;">
			<h2>Notre Meilleur Produit</h2>
		</div>
		<div class="row">
			@foreach ($product_best as $product_b)
				@if ($product_b->score != 0)
					<div class="col-sm-6 col-md-4 col-lg-3" style="display: block; margin: auto;">
						<div class="box hover-overlay" style="border-radius: 25px; background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);">
							<a href="{{route('product.details', $product->id)}}" style="background-color: rgb(238, 238, 238); color: black;">
								<div class="img-box" style="padding-bottom: 0;">
									<img src="{{asset('product_img/'.$product_b->image)}}">
								</div>
								<div class="detail-box">
									{{$product_b->name}}<br><br>
									Prix: {{$product_b->price}}€<br>
									@if ($product_b->quantity != 0)
										Quantité: ×{{$product_b->quantity}}<br>
									@else
										Quantité: En Rupture
									@endif
									Score: {{$product_b->score}}
								</div>
							</a>
						</div>
					</div>
				@else
					<h4 style="display: block; margin: auto; text-align: center;">Pas assez de notes</h4><br>
				@endif		
			@endforeach
		</div>
		<div class="btn-box">
			<a href="{{route('products.best')}}">Voir Les Meilleurs Produits</a>
		</div>
	</div>

@endsection