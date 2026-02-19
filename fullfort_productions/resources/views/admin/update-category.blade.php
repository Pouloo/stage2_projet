@extends('admin.design')

<base href="/public">
@section('update_category')

    @if(session('category_update_message'))
        <div class="mb-4 border px-4 py-3 rounded relative" style="color: turquoise;">
            {{ session('category_update_message') }}
        </div>
    @endif
    <div class="container-fluid">
        <form action="{{route('admin.post.update.category', $category->id)}}" method="POST">
            @csrf
            <input type="text" name="category_name" placeholder="Entrez Nom" value="{{$category->name}}" style="height: 50px;">
            <input type="submit" name="submit" value="Modifier Catégorie" style="height: 50px; color: Turquoise; font-weight: bold">
        </form>
    </div>

@endsection