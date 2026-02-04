@extends('admin.design')

@section('add_category')

    @if(session('category_message'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('category_message') }}
        </div>
    @endif
    <div class="container-fluid">
        <form action="{{route('admin.post.category')}}" method="POST">
            @csrf
            <input type="text" name="category" placeholder="Entrez nom catégorie">
            <input type="submit" name="submit" value="Ajouter Catégorie">
        </form>
    </div>

    

@endsection