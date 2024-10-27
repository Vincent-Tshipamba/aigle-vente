<?php

use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('sellers/{seller}')->group(function () {
    Route::get('/shops', [ShopController::class, 'index']);
    Route::post('/shops', [ShopController::class, 'store']);
    Route::put('/shops/{shop}', [ShopController::class, 'update']);
    Route::delete('/shops/{shop}', [ShopController::class, 'destroy']);
});

Route::prefix('shops/{shop}')->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
});

Route::middleware(['auth'])->group(function () {
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
