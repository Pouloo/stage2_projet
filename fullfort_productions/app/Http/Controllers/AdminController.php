<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function add_category()
    {
        return view("admin.add-category");
    }
    public function post_add_category(Request $request)
    {
        $category = new Category();

        $category->name = $request->category_name;
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

        $category->name = $request->category_name;

        $category->save();
        return redirect()->back()->with('category_update_message', 'Catégorie modifiée avec succès!');
    }

    public function add_product(Request $request)
    {
        $categories = Category::all();
        return view('admin.add-product', compact('categories'));
    }
    public function post_add_product(Request $request)
    {
        $product = New Product();
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->quantity = $request->product_quantity;
        $product->category = $request->product_category;

        $image = $request->product_image;
        if ($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $product->image = $imagename;
        }

        $product->save();
        
        if ($image &&  $product->save())
        {
            $request->product_image->move('product_img', $image);
        }

        return redirect()->back()->with('product_add_message', 'Produit ajouté avec succès!');
    }
}