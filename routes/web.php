<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

// -----------------------------
// Public Routes
// -----------------------------

Route::get('/', [FrontendController::class,'welcome'])->name('welcome');

Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/search_shop', [FrontendController::class, 'ShopFind'])->name('shop.search');

Route::get('/detail/{id}',[FrontendController::class, 'detail'])->name('detail');
Route::post('/details-cart/{id}', [FrontendController::class, 'addcartdetail'])->name('detail.addcard');


// Cart Routes
Route::get('/cart-add/{id}',[CartController::class, 'addCart'])->name('cart.add');
Route::get('/cart-list',[CartController::class, 'list'])->name('cart.list');
Route::get('/cart-increase/{id}', [CartController::class, 'cartincrease'])->name('cart.increase');
Route::get('/cart-decrease/{id}', [CartController::class, 'cartdecrease'])->name('cart.decrease');
Route::get('/cart-remove/{id}', [CartController::class, 'cartremove'])->name('cart.remove');
Route::get('/checkout', [CartController::class,'checkout'])->name('cart.checkout');


// Clear Cart (debug route)
Route::get('/clear-cart', function() {
    session()->forget('cart');
    return 'Cart cleared!';
});


// -----------------------------
// Admin / Resource Routes
// -----------------------------
Route::resource('orders', OrderController::class);
Route::resource('category', CategoryController::class);
Route::get('search_category',[CategoryController::class, 'search'])->name('category.search');

Route::resource('items', ItemController::class);
Route::get('search_item',[ItemController::class, 'search'])->name('items.search');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function() {
    Route::get('/my-account', [AccountController::class, 'index'])->name('account.index');
});




require __DIR__.'/auth.php';
