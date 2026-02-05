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
    public function post_add_category(Request $request)
    {
        $category = new Category();

        $category->name = $request->category;
        $category->save();

        return redirect()->back()->with('category_add_message', 'Catégorie ajoutée avec succès!');
    }
    public function show_category()
    {
        $categories = Category::all();

        return view('admin.show-category', compact('categories'));
    }
    public function delete_category($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();
        return redirect()->back()->with('category_del_message', 'Catégorie supprimée avec succès!');
    }
    public function update_category($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.update-category', compact('category'));
    }
    public function post_update_category(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->category;
        $category->save();

        return redirect()->back()->with('category_update_message', 'Catégorie modifiée avec succès!');
    }
}