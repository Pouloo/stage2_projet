@extends('design')

<base href="/public">
@section('cart_products')

    <div style="width: 50%; margin: auto; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px 8px rgba(0,0,0,0.1) ;">
        <h1 style="text-align: center;">Votre Panier</h1><br>
        <div class="btn-box" style="margin-top: 0;">
            <a href="{{route('index')}}" style="margin-bottom: 20px; color: black; font-size: 25px; float: right; margin-right: 10px;">Retour</a>
        </div>
        @if ($count != 0)
            <table style="width: 40%; height: 40%; margin: auto; font-family: Arial, sans-serif; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Nom Produit</th>
                        <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Description Produit</th>
                        <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Prix Produit</th>
                        <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Image</th>
                        <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $price = 0;
                    @endphp
                    @foreach($cart as $cart_product)
                        <tr style="border-bottom: 1px solid #dddddd;">
                            <td style="padding: 12px;">{{$cart_product->product->name}}</td>
                            <td style="padding: 12px;">{{Str::limit($cart_product->product->description, 50, " ...")}}</td>
                            <td style="padding: 12px;">{{$cart_product->product->price}}€</td>
                            <td style="padding: 12px;"><img src="{{asset('product_img/'.$cart_product->product->image)}}" style="width: 150px;"></td>
                            <td style="padding: 12px;">
                                <a href="{{route('cart.delete.product', $cart_product->id)}}" style="padding: 10px; background-color: red; color: white;">Retirer&nbsp;du&nbsp;Panier</a>
                            </td>
                        </tr>
                        @php
                            $price = $price + $cart_product->product->price;
                        @endphp
                    @endforeach
                    <tr style="border-bottom: 1px solid #dddddd;">
                        <td style="padding: 12px; font-size: 20px; font-weight: bold;">Prix&nbsp;Total&nbsp;=&nbsp;{{$price}}€</td>
                    </tr>
                </tbody>
            </table>
        @else
            <h4 style="margin: 50px; text-align: center;">Votre panier est vide.</h4><br>
        @endif
    </div>

@endsection