<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryProductController;

// Dashboard
Route::middleware(['auth', 'userOnline', 'checkRole:superadmin'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/api/clients', [DashboardController::class, 'getClientsByPeriod']);

    // Users
    Route::resource('users', UserController::class);
    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/{user}', [UserController::class, 'show'])->middleware('checkAdmin:id')->name('admin.users.show');
    Route::delete('/users/delete/{user}', [UserController::class, 'destroyUser'])->name('users.delete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
    Route::get('admin/api/user-activity', [UserController::class, 'getUserActivity']);
    Route::post('admin/users/change-status', [UserController::class, 'changeUserStatus'])->name('admin.users.change-status');

    // Roles and Permissions
    Route::post('/users/roles/update', [UserController::class, 'updateUserRole'])->name('users.roles.update');
    Route::delete('/users/roles/delete', [UserController::class, 'deleteUserRole'])->name('users.roles.delete');
    Route::get('/roles-permissions', [RolePermissionController::class, 'getRolesPermissions'])->name('roles.permissions.index');
    Route::get('/users-roles', [RolePermissionController::class, 'getUsersRoles'])->name('roles.users.index');
    Route::post('/roles-permissions/update', [RolePermissionController::class, 'updateRolePermissions'])->name('roles.permissions.update');


    // Roles only
    Route::post('/roles/create', [RolePermissionController::class, 'createRole'])->name('roles.store');
    Route::put('/roles/{role}', [RolePermissionController::class, 'updateRole'])->name('roles.update');
    Route::delete('/roles/{role}', [RolePermissionController::class, 'destroyRole'])->name('roles.destroy');

    // Permissions only
    Route::post('/permissions/create', [RolePermissionController::class, 'createPermission'])->name('permissions.store');
    Route::put('/permissions/{permission}', [RolePermissionController::class, 'updatePermission'])->name('permissions.update');
    Route::delete('/permissions/{permission}', [RolePermissionController::class, 'destroyPermission'])->name('permissions.destroy');

    // Clients
    Route::get('admin/clients', [ClientController::class, 'index'])->name('admin.clients.index');
    Route::get('admin/clients/{client}', [ClientController::class, 'show'])->name('admin.clients.show');
    Route::get('admin/api/orders', [ClientController::class, 'getOrdersByUser']);
    Route::delete('admin/clients/delete/{client}', [ClientController::class, 'destroyClient'])->name('admin.clients.delete');
    Route::post('admin/clients/change-status', [ClientController::class, 'changeClientStatus'])->name('admin.clients.change-status');

    // Sellers
    Route::get('admin/sellers', [SellerController::class, 'index'])->name('admin.sellers.index');
    Route::get('admin/api/seller-orders', [SellerController::class, 'getOrdersBySeller']);
    Route::get('admin/sellers/{seller}', [SellerController::class, 'show'])->name('admin.sellers.show');
    Route::post('admin/sellers/change-status', [SellerController::class, 'changeSellerStatus'])->name('admin.sellers.change-status');

    // Products
    Route::get('admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('admin/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::post('admin/products/change-status', [ProductController::class, 'changeProductStatus'])->name('admin.products.change-status');

    // Orders
    Route::get('admin/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::get('admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('admin/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');

   // Categories
Route::get('admin/categories', [CategoryProductController::class, 'index'])->name('admin.categories.index');
Route::post('admin/categories/store', [CategoryProductController::class, 'store'])->name('admin.categories.store');
Route::get('admin/categories/{category}', [CategoryProductController::class, 'show'])->name('admin.categories.show');
Route::get('admin/categories/{category}/edit', [CategoryProductController::class, 'edit'])->name('admin.categories.edit');
Route::put('admin/categories/{category}', [CategoryProductController::class, 'update'])->name('admin.categories.update');
Route::delete('admin/categories/{category}', [CategoryProductController::class, 'destroy'])->name('admin.categories.destroy');



    // Shops
    Route::get('admin/shops', [ShopController::class, 'index'])->name('admin.shops.index');
    Route::get('admin/api/shop/orders-flow', [ShopController::class, 'getOrdersFlow']);
    Route::get('admin/shops/{shop}', [ShopController::class, 'show'])->name('admin.shops.show');
    Route::post('admin/shops/change-status', [ShopController::class, 'changeShopStatus'])->name('admin.shops.change-status');
});