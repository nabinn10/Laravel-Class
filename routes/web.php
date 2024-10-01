<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('home');

Route::get('/viewproduct/{id}', [PagesController::class, 'viewproduct'])->name('viewproduct');

//to view the product with based on category
Route::get('/categoryproduct/{id}', [PagesController::class, 'categoryproduct'])->name('categoryproduct');


Route::resource('blogs', BlogsController::class);

// route for search
Route::get('/search', [PagesController::class, 'search'])->name('search');




Route::middleware('auth')->group(function() {
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    //to look for mycart
    Route::get('mycart', [CartController::class, 'mycart'])->name('mycart');
    //to delete the item from cart
    Route::get('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

    //to checkout
    Route::get('/checkout/{cartid}', [PagesController::class, 'checkout'])->name('checkout');

    // to store the order
    Route::get('/order/store/{cartid}', [OrderController::class, 'store'])->name('order.store');

    Route::post('/order/store/', [OrderController::class, 'storecod'])->name('order.storecod');

});




Route::middleware(['auth','admin'])->group(function () {

    Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');

    Route::get('/blogs/create', [BlogsController::class, 'create'])->name('blogs.create');

    //route for storing blogs
    Route::post('/blogs/store', [BlogsController::class, 'store'])->name('blogs.store');

    //edit blogs
    Route::get('/blogs/{id}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');


    //update blogs
    Route::POST('/blogs/{id}/update', [BlogsController::class, 'update'])->name('blogs.update');

    //destroy
    Route::get('/blogs/{id}/destroy', [BlogsController::class, 'destroy'])->name('blogs.destroy');

    //category ko lagi gareko
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

    //
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

    //store category
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

    //edit category
    Route::get('/cagtegory/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');

    //update category
    Route::POST('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');

    //destroy
    Route::delete('/category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

    //product ko lagi gareko
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::POST('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

    // order
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');

    // Route
    Route::get('/order/{id}/status/{status}', [OrderController::class, 'status'])->name('order.status');




});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
