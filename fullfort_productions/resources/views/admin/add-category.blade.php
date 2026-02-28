@extends('admin.design')

<base href="/public">
@section('add_category')

    @if(session('category_add_message'))
        <div class="mb-4 border px-4 py-3 rounded relative" style="color: green;">
            {{session('category_add_message')}}
        </div>
    @endif
    <div class="container-fluid">
        <form action="{{route('admin.post.add.category')}}" method="POST">
            @csrf
            <input type="text" name="category_name" placeholder="Entrez Nom" style="height: 50px;">
            <input type="submit" name="submit" value="Ajouter Catégorie" style="height: 50px; color: green; font-weight: bold">
        </form>
    </div>

@endsection