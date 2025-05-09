<?php

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\WishlistController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\ShopController as ClientShopController;
use App\Http\Controllers\HomeController; // Routes accessible to any online user

Route::middleware('userOnline')->group(function () {
    // Home and Static Pages
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


    // Product and Shop Routes
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/getProducts', [HomeController::class, 'getProducts'])->name('getProducts');
    Route::get('/getSearchProducts', [ProductController::class, 'getSearchProducts'])->name('getSearchProducts');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/shop/{_id}', [ShopController::class, 'show'])->name('shops.show');
    Route::get('/shops',[ClientShopController::class,'index'])->name('shops.all');


    Route::middleware(['track.visits'])->group(function () {
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    });

    Route::post('/reviews/{id}', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');
    Route::post('/products/category/filter', [ProductController::class, 'filterProductsByCategory']);
    Route::post('/products/filter', [ProductController::class, 'filtersProducts']);
    Route::post('/products/seller-location/filter', [ProductController::class, 'sellerLocationFilter']);

});

// Routes for authenticated users
    Route::middleware(['auth', 'userOnline'])->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard and Order Management
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('client.dashboard');//
    Route::get('/client/dashboard', [DashboardController::class, 'index'])->name('client.dashboard');
    Route::get('/client/orders', [DashboardController::class, 'orders'])->name('client.orders');
    Route::get('/client/api/wishlist', [DashboardController::class, 'getClientWishlistByPeriod']);
    Route::get('/client/api/contacted-sellers', [DashboardController::class, 'getClientContactedSellersByPeriod']);

    // Wishlist Routes
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('client.wishlist.add');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('client.wishlist.remove');
    Route::get('/wishlist', [WishlistController::class, 'getUserWishlist'])->name('client.wishlist');

    Route::post('contact/{sellerId}/{productId}', [ProductController::class, 'contactSeller'])->name('contact.seller');
});
