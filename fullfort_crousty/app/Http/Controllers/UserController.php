<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\CartProduct;
use App\Models\Commande;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->user_type=="user")
            return view('dashboard');
        else if (Auth::check() && Auth::user()->user_type=="admin")
            return view('admin.dashboard');
    }
    
    public function get_products_latest()
    {
        $count = CartProduct::where('user_id', Auth::id())->count();

        $products = Product::latest()->take(2)->get();

        return view('index', compact('products', 'count'));
    }
    public function get_products_all()
    {
        $count = CartProduct::where('user_id', Auth::id())->count();

        $products = Product::all();

        return view('products-all', compact('products', 'count'));
    }
    public function get_product_details($id)
    {
        $count = CartProduct::where('user_id', Auth::id())->count();

        $product = Product::findOrFail($id);

        return view('product-details', compact('product', 'count'));
    }

    public function cart_add_product($id)
    {
        $product = Product::findOrFail($id);

        $cart_product = new CartProduct();
        $cart_product->user_id = Auth::id();
        $cart_product->product_id = $product->id;

        $cart_product->save();
        return redirect()->back()->with('cart_add_message', 'Produit ajouté au panier!');
    }
    public function cart_get_products()
    {
        $count = CartProduct::where('user_id', Auth::id())->count();
        $cart_products = CartProduct::where('user_id', Auth::id())->get();

        return view('cart-products', compact('count', 'cart_products'));
    }
    public function cart_delete_product($id)
    {
        $cart_product = CartProduct::findOrFail($id);
        $cart_product->delete();

        return redirect()->back();
    }
    public function confirm_commande(Request $request)
    {
        $cart_products = CartProduct::where('user_id', Auth::id())->get();
        
        foreach ($cart_products as $cart_product)
        {
            $commande = New Commande();
            $commande->client_address = $request->client_adress;
            $commande->client_phone = $request->client_phone;
            $commande->user_id = Auth::id();
            $commande->product_id = $cart_product->product_id;
            $commande->save();
        }
    }
}
