<!-- Affichage des charactéristiques d'un produit spécifique, bouton d'ajout dans le panier de l'utilisateur -->
@extends('design')

<base href="/public">
@section('product_details')

    <div style="max-width: 1000px; margin: 5 auto; padding: 20px">
        @if(session('cart_add_message'))
            <div class="mb-4 border px-4 py-3 rounded relative" style="padding: 10px; background-color: green; color: white;">
                {{session('cart_add_message')}}
            </div>
        @endif

        <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px 8px rgba(0,0,0,0.1) ;">
            <div class="btn-box">
                <a href="{{route('index')}}" style="margin-bottom: 20px; color: black; font-size: 25px; float: right; margin-right: 10px;">Retour</a>
		    </div>
            <img src="{{asset('product_img/'.$product->image)}}" style="width: 200px;">    
            <div style="padding: 30px; height: 150px;">
                <h1 style="margin: 0px 0px 15px; color: #333333">{{$product->name}}</h1>
                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <span style="font-size: 24px; font-weight: bold; color: #2a5885;">{{$product->price}}€</span><br><br>
                    @if ($product->quantity != 0)
                        <span style="font-size: 24px; font-weight: bold; color: #2a5885; margin-left: 20px;">×{{$product->quantity}}</span>
                        <span style="margin-left: 15px; padding: 3px 8px; background-color: #4caf50; color: white;">En stock</span>
                    @else
                        <span style="margin-left: 15px; padding: 3px 8px; background-color: #d92629; color: white;">En Rupture</span>
                    @endif
                </div>
            </div>
            <p style="margin: 0 30px;">{{$product->description}}</p>
            @if ($product->quantity != 0)
                <a href="{{route('cart.add.product', $product->id)}}" style="background-color: #2a5885; color: white; border: none; padding: 12px 25px; margin: 10px 30px; font-size: 16px; border-radius: 4px; cursor: pointer; float: left;">Ajouter au Panier</a>
            @endif
        </div>
    </div>

@endsection