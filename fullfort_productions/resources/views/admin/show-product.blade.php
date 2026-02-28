@extends('admin.design')

<base href="/public">
@section('show_product')

    @if(session('product_del_message'))
        <div class="mb-4 border px-4 py-3 rounded relative" style="color: orangered;">
            {{session('product_del_message')}}
        </div>
    @endif


    <table style="width: 100%; font-family: Arial, sans-serif; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">ID Produit</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Nom Produit</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Description Produit</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Quantité Produit</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Prix Produit</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Image Produit</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Catégorie Produit</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr style="border-bottom: 1px solid #dddddd;">
                    <td style="padding: 12px;">{{$product->id}}</td>
                    <td style="padding: 12px;">{{$product->name}}</td>
                    <td style="padding: 12px;">{{Str::limit($product->description, 50, " ...")}}</td>
                    <td style="padding: 12px;">{{$product->quantity}}</td>
                    <td style="padding: 12px;">{{$product->price}}</td>
                    <td style="padding: 12px;"><img src="{{asset('product_img/'.$product->image)}}" style="width: 150px;"></td>
                    <td style="padding: 12px;">{{$product->category}}</td>
                    <td style="padding: 12px;">
                        <a href="{{route('admin.update.product', $product->id)}}" style="color: turquoise;">Modifier</a>
                        <a href="{{route('admin.delete.product', $product->id)}}" onclick="return confirm('Veuillez confirmer la suppression.')" style="color: orangered;">Supprimer</a>
                    </td>
                </tr>
            @endforeach

            {{$products->links()}}
        </tbody>
    </table>

@endsection