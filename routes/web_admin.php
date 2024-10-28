<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryProductController;

// Dashboard
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/clients', [DashboardController::class, 'getClientsByPeriod'])->name('admin.clients.index');


    // Users
    Route::resource('users', UserController::class);
    Route::get('admin/users', [UserController::class, 'index'])->middleware('checkRole:superadmin')->name('admin.users.index');
    Route::delete('/users/delete/{user}', [UserController::class, 'destroyUser'])->name('users.delete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');


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
    Route::get('admin/clients', [ClientController::class, 'index'])->middleware('checkRole:superadmin')->name('admin.clients.index');
    Route::delete('admin/clients/delete/{client}', [ClientController::class, 'destroyClient'])->name('admin.clients.delete');

    // Sellers
    Route::get('admin/sellers', [SellerController::class, 'index'])->middleware('checkRole:superadmin')->name('admin.sellers.index');
    Route::get('admin/sellers/{seller}', [SellerController::class, 'show'])->name('admin.sellers.show');

    // Products
    Route::get('admin/products', [ProductController::class, 'index'])->middleware('checkRole:superadmin')->name('admin.products.index');
    Route::get('admin/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
    // Orders
    Route::get('admin/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::get('admin/orders', [OrderController::class, 'index'])->middleware('checkRole:superadmin')->name('admin.orders.index');

    // Categories
    Route::get('admin/categories', [CategoryProductController::class, 'index'])->middleware('checkRole:superadmin')->name('admin.categories.index');
    Route::get('admin/categories/{category}', [CategoryProductController::class, 'show'])->name('admin.categories.show');

    // Shops
    Route::get('admin/shops', [ShopController::class, 'index'])->middleware('checkRole:superadmin')->name('admin.shops.index');
    Route::get('admin/shops/{shop}', [ShopController::class, 'show'])->name('admin.shops.show');
})->middleware('checkRole:superadmin');