<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function add_category()
    {
        return view("admin.add-category");
    }
    public function post_category(Request $request)
    {
        $category=new Category();
        $category->name=$request->category;
        $category->save();

        return redirect()->back()->with('category_message', 'Catégorie ajoutée avec succès!');
    }
}
