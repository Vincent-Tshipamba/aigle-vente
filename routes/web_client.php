<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::middleware('userOnline')->group(function () {
    Route::get('/', function () {
        $products = Product::with('shop.seller')->get();

        $saleProducts = $products->filter(function ($product) {
            return $product->promotions->isNotEmpty();
        });

        // Retourner la vue avec les produits
        return view('home.index', compact('products', 'saleProducts'));
    })->name('home');

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

    Route::get('/blog', function () {
        return view('blog.blog');
    })->name('blog');

    Route::get('/blog-detail', function () {
        return view('blog.blog-details');
    })->name('blog-details');
});

Route::middleware(['auth', 'userOnline'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('client.dashboard');
});

