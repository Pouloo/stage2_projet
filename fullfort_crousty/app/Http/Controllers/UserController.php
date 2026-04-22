<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\CartProduct;
use App\Models\OrderProduct;

class UserController extends Controller
{
    public function index()
    {
        $product_count = Product::count();
        $user_count = User::where('user_type', 'user')->count();
        $ordered_products_count = OrderProduct::where('status', 'pending')->count();
        $delivered_products_count = OrderProduct::where('status', 'delivered')->count();

        if (Auth::check() && Auth::user()->user_type=="user")
            return view('dashboard');
        else if (Auth::check() && Auth::user()->user_type=="admin")
            return view('admin.dashboard', compact('product_count', 'user_count', 'ordered_products_count', 'delivered_products_count'));
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
    public function confirm_order(Request $request)
    {
        $cart_products = CartProduct::where('user_id', Auth::id())->get();
        
        foreach ($cart_products as $cart_product)
        {
            $order_product = New OrderProduct();
            $order_product->client_address = $request->client_address;
            $order_product->client_phone = $request->client_phone;
            $order_product->user_id = Auth::id();
            $order_product->product_id = $cart_product->product_id;
            $order_product->save();
        }

        $cart_products = CartProduct::where('user_id', Auth::id())->get();
        foreach ($cart_products as $cart_product)
        {
            $cart_product_del = CartProduct::findOrFail($cart_product->id);
            $cart_product_del->delete();
        }
        return redirect()->back()->with('order_confirm_message', 'Commande Validée');
    }
    public function show_user_orders()
    {
        $order_products = OrderProduct::where('user_id', Auth::id())->get();

        return view('show-orders', compact('order_products'));
    }
}