<!-- Vue par d'accueil / Affichage des produits récemment ajoutés -->
@extends('design')

<!-- <base href="/public"> -->
@section('index')

	<div class="container">
		<div class="heading_container heading_center">
			<h2>Nouveautés</h2>
		</div>
		<div class="row">
			@foreach ($products as $product)
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="box hover-overlay" style="border-radius: 25px;">
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
			<a href="{{route('products.all')}}">Voir Tous Les Produits</a>
		</div>
	</div>

@endsection