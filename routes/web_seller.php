<?php

use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', [DashboardController::class, 'welcome'])->name('welcome');

Route::middleware(['auth'])->group(function () {

    Route::get('/seller/shop/message', [MessageController::class, 'index'])->name('message.index');
    Route::post('/seller/shop/message/{seller_id}', [MessageController::class, 'store'])->name('message.store');
    Route::post('/seller/shop/message/{message}/mark-as-read', [MessageController::class, 'markAsRead'])->name('seller.shop.message.markAsRead');
    Route::post('/messages/send/{seller_id}', [MessageController::class, 'sendMessage'])->name('messages.send');
    Route::get('/messages/{contactId}', [MessageController::class, 'showConversation'])->name('messages.showConversation');
    Route::get('/messages', [MessageController::class, 'getUserMessages'])->name('messages');

    Route::get('/shops/{shop:_id}/products/{product:_id}/edit', [ProductController::class, 'edit'])->name('seller.shops.products.edit');
    Route::put('/shops/{shop}/products/{product}', [ProductController::class, 'update'])->name('seller.shops.products.update');
    Route::get('/seller/shops/{shop:_id}/products', [ProductController::class, 'index'])->name('seller.shops.products.index');
    Route::get('/seller/shops/product/{product:_id}/detail', [ProductController::class, 'show'])->name('seller.shops.products.show');
    Route::post('/shops/{shop}/products', [ProductController::class, 'store'])->name('shop.products.store');
    Route::delete('/seller/shops/{product}', [ProductController::class, 'destroy'])->name('seller.shops.products.destroy');
    Route::post('/shops/products/{product}/promotion-request', [ProductController::class, 'requestPromotion'])->name('products.promotion');
    Route::get('/seller/shops/{shop:_id}/products/nouveau/product', [ProductController::class, 'create'])->name('seller.shops.products.create');
    Route::get('/stocks/{product:_id}', [ProductController::class, 'manageStockIndex'])->name('stocks.edit');
    Route::post('/products/{product}/manage-stock', [ProductController::class, 'manageStock'])->name('products.manageStock');
    Route::get('/api/stock-movements', [DashboardController::class, 'mouvementStock']);
    Route::get('/api/chart-data', [DashboardController::class, 'getChartData']);
    Route::get('/api/messages-locations', [DashboardController::class, 'getChartDataLocation']);
    Route::get('/api/shop/visitors', [DashboardController::class, 'getShopVisitors']);
    Route::get('/activites/search', [ProductController::class, 'search'])->name('product.search');

    Route::delete('/products/{product}/images/{photoId}', action: [ProductController::class, 'deleteImage'])->name('product.deleteImage');
    Route::get('/products/{shop:_id}/shop', [ProductController::class, 'fetchProducts'])->name('products.fetch');
    Route::post('/products/{id}/toggle-status', [ProductController::class, 'toggleStatus'])->name('products.toggleStatus');

    Route::post('/seller/update-profile-picture', [SellerController::class, 'updateProfilePicture'])->name('seller.updateProfilePicture');

    Route::delete('seller/shops/{shop:_id}', [ShopController::class, 'destroy'])->name('shops.destroy');
    Route::put('seller/shops/{shop:_id}/edit', [ShopController::class, 'update'])->name('shops.update');
    Route::get('seller/shops/{shop:_id}/edit', [ShopController::class, 'edit'])->name('shops.edit');
    Route::get('/seller/shops', [ShopController::class, 'index'])->name('shops.index');
    Route::get('/seller/shops/create', [ShopController::class, 'create'])->name('shops.create');
    Route::post('seller/shops', [ShopController::class, 'store'])->name('shops.store');
    Route::get('api/shop/search', [ShopController::class, 'search'])->name('shop.search');


    Route::get('/seller/dashboard', [DashboardController::class, 'index'])->name('seller.dashboard');
    Route::get('/seller/profile', [SellerController::class, 'profile'])->name('seller.profile');
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