<?php

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\WishlistController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\HomeController;

Route::middleware('userOnline')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('/fashion', function () {
        return view('home.fashion');
    })->name('home.fashion');

    Route::get('/furnitures', function () {
        return view('home.furniture');
    })->name('home.furniture');

    Route::get('/food-grocery', function () {
        return view('home.food-grocery');
    })->name('home.food-grocery');

    Route::get('/cosmetics', function () {
        return view('home.cosmetic');
    })->name('home.cosmetic');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/shop/{shop}', [ShopController::class, 'show'])->name('shops.show');
});

Route::middleware(['auth', 'userOnline'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('client.dashboard');

    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('client.wishlist.add');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('client.wishlist.remote');
    Route::get('/wishlist', [WishlistController::class, 'getUserWishlist'])->name('client.wishlist');

    Route::get('/client/dashboard', [DashboardController::class, 'index'])->name('client.dashboard');
    Route::get('/client/orders', [DashboardController::class, 'orders'])->name('client.orders');
    Route::get('/client/api/orders', [DashboardController::class, 'getOrdersWishlistByPeriod']);
});