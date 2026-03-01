@extends('admin.design')

<base href="/public">
@section('update_category')

    @if(session('category_update_message'))
        <div class="mb-4 border px-4 py-3 rounded relative" style="padding: 10px; background-color: green; color: white;">
            {{ session('category_update_message') }}
        </div>
    @endif
    <div class="container-fluid">
        <form action="{{route('admin.post.update.category', $category->id)}}" method="POST">
            @csrf
            <input type="text" name="category_name" placeholder="Entrez Nom" value="{{$category->name}}" style="height: 50px;">
            <input type="submit" name="submit" value="Modifier Catégorie" style="height: 50px; padding: 10px; background-color: turquoise; color: white;">
        </form>
    </div>

@endsection