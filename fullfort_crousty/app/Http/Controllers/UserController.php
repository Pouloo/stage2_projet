<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Models\Product;
use App\Models\Cart;

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
        $count = Cart::where('user_id', Auth::id())->count();

        $products = Product::latest()->take(2)->get();

        return view('index', compact('products', 'count'));
    }
    public function get_products_all()
    {
        $count = Cart::where('user_id', Auth::id())->count();

        $products = Product::all();

        return view('products-all', compact('products', 'count'));
    }
    public function get_product_details($id)
    {
        $count = Cart::where('user_id', Auth::id())->count();

        $product = Product::findOrFail($id);

        return view('product-details', compact('product', 'count'));
    }

    public function cart_add($id)
    {
        $product = Product::findOrFail($id);

        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->product_id = $product->id;

        $cart->save();
        return redirect()->back()->with('cart_add_message', 'Produit ajouté au panier!');
    }
    public function cart_get_products()
    {
        $count = Cart::where('user_id', Auth::id())->count();
        $cart = Cart::where('user_id', Auth::id())->get();

        return view('cart-products', compact('count', 'cart'));
    }
    public function cart_delete_product($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->back();
    }
}
