@extends('admin.design')

<base href="/public">
@section('update_product')

    @if(session('product_update_message'))
        <div class="mb-4 border px-4 py-3 rounded relative" style="color: turquoise;">
            {{ session('product_update_message') }}
        </div>
    @endif
    <div class="container-fluid">
        <form action="{{route('admin.post.update.product', $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="product_name" placeholder="Entrez Nom" value="{{$product->name}}" style="height: 50px;"><br><br>
            <textarea name="product_description" placeholder="Entrez Description" style="height: 50px;">{{$product->description}}</textarea><br><br>
            <input type="number" name="product_quantity" placeholder="Entrez Quantité" value="{{$product->quantity}}" style="height: 50px;"><br><br>
            <input type="number" name="product_price" placeholder="Entrez Prix" value="{{$product->price}}" style="height: 50px;"><br><br>
            <label>Image Actuelle</label><br>
            <img src="{{asset('product_img/'.$product->image)}}" style="width: 150px;" ><br><br>
            <label>Entrez Image</label><br>
            <input type="file" name="product_image" style="height: 50px;"><br><br>
            <select name="product_category" value="{{$product->category}}">
                @foreach ($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
            </select><br><br>
            <input type="submit" name="submit" value="Modifier Produit" style="height: 50px; color: green; font-weight: bold">
        </form>
    </div>

@endsection