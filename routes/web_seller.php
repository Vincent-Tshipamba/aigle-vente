<?php

use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->group(function () {
    


    Route::resource('/seller/shop/message', MessageController::class);
    Route::post('/seller/shop/message/{message}/mark-as-read', [MessageController::class, 'markAsRead'])->name('seller.shop.message.markAsRead');
    Route::post('/messages/{user}', [MessageController::class, 'store'])->name('messages.send');



    Route::get('/seller/shops/{shop}/products', [ProductController::class, 'index'])->name('seller.shops.products.index');
    Route::get('/seller/shops/product/{product:_id}/detail', [ProductController::class, 'show'])->name('seller.shops.products.show');
    Route::post('/shops/{shop}/products', [ProductController::class, 'store'])->name('shop.products.store');
    Route::put('/seller/shops/{product}', [ProductController::class, 'update'])->name('seller.shops.products.update');
    Route::delete('/seller/shops/{product}', [ProductController::class, 'destroy'])->name('seller.shops.products.destroy');
    Route::post('/shops/products/{product}/promotion-request', [ProductController::class, 'requestPromotion'])->name('products.promotion');


    Route::get('/seller/shops', [ShopController::class, 'index'])->name('shops.index');
    Route::get('/seller/shops/create', [ShopController::class, 'create'])->name('shops.create');
    Route::post('seller/shops', [ShopController::class, 'store'])->name('shops.store');


    Route::get('/seller/dashboard', [DashboardController::class, 'index'])->name('seller.dashboard');
    Route::get('/dashboard/sales-statistics/{seller}', [DashboardController::class, 'salesStatistics'])->name('dashboard.salesStatistics');
    Route::get('/dashboard/order-statistics/{seller}', [DashboardController::class, 'orderStatistics'])->name('dashboard.orderStatistics');
    Route::get('/sellers/create', [SellerController::class, 'create'])->name('sellers.create');
    Route::post('/sellers', [SellerController::class, 'store'])->name('sellers.store');
    Route::get('/sellers', [SellerController::class, 'index'])->name('sellers.index');
    Route::get('/sellers/{id}', [SellerController::class, 'show'])->name('sellers.show');
    Route::get('/sellers/{id}/edit', [SellerController::class, 'edit'])->name('sellers.edit');
    Route::put('/sellers/{id}', [SellerController::class, 'update'])->name('sellers.update');
    Route::delete('/sellers/{id}', [SellerController::class, 'destroy'])->name('sellers.destroy');
});
