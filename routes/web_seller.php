<?php

use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('sellers')->group(function () {
    Route::get('/', [SellerController::class, 'index']);
    Route::post('/', [SellerController::class, 'store']);
    Route::get('/{id}', [SellerController::class, 'show']);
    Route::put('/{id}', [SellerController::class, 'update']);
    Route::delete('/{id}', [SellerController::class, 'destroy']);
});

// Route::prefix('products')->group(function () {
// Route::get('/', [ProductController::class, 'index']);
// Route::post('/', [ProductController::class, 'store']);
// Route::get('/{id}', [ProductController::class, 'show']);
// Route::put('/{id}', [ProductController::class, 'update']);
// Route::delete('/{id}', [ProductController::class, 'destroy']);
// });

Route::resource('products', ProductController::class);

Route::prefix('shops')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
    Route::post('/', [ShopController::class, 'store']);
    Route::get('/{id}', [ShopController::class, 'show']);
    Route::put('/{id}', [ShopController::class, 'update']);
    Route::delete('/{id}', [ShopController::class, 'destroy']);
});


Route::prefix('cities')->group(function () {
    Route::get('/', [CityController::class, 'index']);
    Route::post('/', [CityController::class, 'store']);
    Route::get('/{id}', [CityController::class, 'show']);
    Route::put('/{id}', [CityController::class, 'update']);
    Route::delete('/{id}', [CityController::class, 'destroy']);
});

Route::get('seller/dashboard', [DashboardController::class, 'index']);
