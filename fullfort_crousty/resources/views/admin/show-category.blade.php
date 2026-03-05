@extends('admin.design')

<base href="/public">
@section('show_category')

    @if(session('category_del_message'))
        <div class="mb-4 border px-4 py-3 rounded relative" style="padding: 10px; background-color: green; color: white;">
            {{session('category_del_message')}}
        </div>
    @endif


    <table style="width: 100%; font-family: Arial, sans-serif; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">ID Catégorie</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Nom Catégorie</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #dddddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr style="border-bottom: 1px solid #dddddd;">
                    <td style="padding: 12px;">{{$category->id}}</td>
                    <td style="padding: 12px;">{{$category->name}}</td>
                    <td style="padding: 12px;">
                        <a href="{{route('admin.update.category', $category->id)}}" style="width: 100px; padding: 10px; background-color: turquoise; color: white;">Modifier</a>
                        <a href="{{route('admin.delete.category', $category->id)}}" onclick="return confirm('Veuillez confirmer la suppression.')" style="width: 100px; padding: 10px; background-color: red; color: white;">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection