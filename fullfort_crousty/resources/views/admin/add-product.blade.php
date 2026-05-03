<!-- Ajout d'une nouvelle ligne dans la table 'product' -->
@extends('admin.design')

<base href="/public">
@section('add_product')

    @if(session('product_add_message'))
        <div class="mb-4 border px-4 py-3 rounded relative" style="padding: 10px; background-color: green; color: white;">
            {{session('product_add_message')}}
        </div>
    @endif
    <div class="container-fluid">
        <form action="{{route('admin.post.add.product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="product_name" placeholder="Entrez Nom" style="height: 50px;"><br><br>
            <textarea name="product_description" placeholder="Entrez Description" style="height: 50px;"></textarea><br><br>
            <input type="number" name="product_quantity" placeholder="Entrez Quantité" style="height: 50px;"><br><br>
            <input type="number" name="product_price" placeholder="Entrez Prix" style="height: 50px;"><br><br>
            <label>Entrez Image</label><br>
            <input type="file" name="product_image" style="height: 50px;"><br><br>
            <label>Entrez Catégorie</label><br>
            <select name="product_category">
                @foreach ($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
            </select><br><br>
            <input type="submit" name="submit" value="Ajouter Produit" style="height: 50px; padding: 10px; background-color: green; color: white;">
        </form>
    </div>

@endsection