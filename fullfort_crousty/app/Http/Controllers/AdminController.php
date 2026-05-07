<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\OrderProduct;
use App\Models\Product;

// Contrôleur Administrateur: Gère l'ajout de produits/catégories, statut des commandes
class AdminController extends Controller
{
    // Méthodes CRUD Usuelles pour les catégories et produits
    public function add_category()
    {
        return view('admin.add-category');
    }
    public function show_categories()
    {
        $categories = Category::all();

        return view('admin.show-categories', compact('categories'));
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

    public function add_product(Request $request)
    {
        $categories = Category::all();

        return view('admin.add-product', compact('categories'));
    }
    public function show_products(Request $request)
    {
        $products = Product::paginate(5);

        return view('admin.show-products', compact('products'));
    }
    public function delete_product($id)
    {
        $product = Product::findOrFail($id);
        $img_path = public_path('product_img/'.$product->image);

        if (file_exists($img_path))
            unlink($img_path);
        
        $product->delete();

        return redirect()->back()->with('product_del_message', 'Produit supprimée avec succès!');
    }
    public function update_product($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.update-product', compact('product', 'categories'));
    }

    // Méthodes de réponse/redirection POST des formulaires pour produits/catégories
    public function post_add_category(Request $request)
    {
        $category = new Category();
        $category->name = $request->category_name;
        $category->save();

        return redirect()->back()->with('category_add_message', 'Catégorie ajoutée avec succès!');
    }
    public function post_update_category(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->category_name;
        $category->save();

        return redirect()->back()->with('category_update_message', 'Catégorie modifiée avec succès!');
    }
    public function post_add_product(Request $request)
    {
        $product = new Product();
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
            $request->product_image->move('product_img', $imagename);

        return redirect()->back()->with('product_add_message', 'Produit ajouté avec succès!');
    }
    public function post_update_product(Request $request, $id)
    {
        $product = Product::findOrFail($id);
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
            $request->product_image->move('product_img', $imagename);

        return redirect()->back()->with('product_update_message', 'Produit modifié avec succès!');
    }

    // Méthodes des Commandes
    public function show_orders()
    {
        $order_products = OrderProduct::paginate(5);

        return view('admin.show-orders', compact('order_products'));
    }
    public function change_order_status(Request $request, $id)
    {
        $order_product = OrderProduct::findOrFail($id);
        $order_product->order_status = $request->status;
        $order_product->save();

        return redirect()->back();
    }
}