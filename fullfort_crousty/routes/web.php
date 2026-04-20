<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'get_products_latest'])->name('index');

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/product-details/{id}', [UserController::class, 'get_product_details'])->name('product.details');
Route::get('/products-all', [UserController::class, 'get_products_all'])->name('products.all');

Route::get('/show-ordered', [UserController::class, 'show_user_orders'])->middleware(['auth', 'verified'])->name('user.show.orders');

Route::middleware('auth')->group(function ()
{
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/cart-add-product/{id}', [UserController::class, 'cart_add_product'])->name('cart.add.product');
    Route::get('/cart-products', [UserController::class, 'cart_get_products'])->name('cart.products');
    Route::get('/cart-delete-product/{id}', [UserController::class, 'cart_delete_product'])->name('cart.delete.product');
    Route::post('/order-confirm', [UserController::class, 'confirm_order'])->name('order.confirm');
});

Route::middleware('admin')->group(function ()
{
    Route::get('/add-category', [AdminController::class, 'add_category'])->name('admin.add.category');
    Route::post('/add-category', [AdminController::class, 'post_add_category'])->name('admin.post.add.category');

    Route::get('/show-categories', [AdminController::class, 'show_categories'])->name('admin.show.categories');

    Route::get('/delete-category/{id}', [AdminController::class, 'delete_category'])->name('admin.delete.category');

    Route::get('/update-category/{id}', [AdminController::class, 'update_category'])->name('admin.update.category');
    Route::post('/update-category/{id}', [AdminController::class, 'post_update_category'])->name('admin.post.update.category');

    Route::get('/add-product', [AdminController::class, 'add_product'])->name('admin.add.product');
    Route::post('/add-product', [AdminController::class, 'post_add_product'])->name('admin.post.add.product');

    Route::get('/show-products', [AdminController::class, 'show_products'])->name('admin.show.products');

    Route::get('/delete-product/{id}', [AdminController::class, 'delete_product'])->name('admin.delete.product');

    Route::get('/update-product/{id}', [AdminController::class, 'update_product'])->name('admin.update.product');
    Route::post('/update-product/{id}', [AdminController::class, 'post_update_product'])->name('admin.post.update.product');

    Route::get('/show-orders', [AdminController::class, 'show_orders'])->name('admin.show.orders');
    Route::post('/order-status/{id}', [AdminController::class, 'change_order_status'])->name('admin.order.status');
});

require __DIR__.'/auth.php';
