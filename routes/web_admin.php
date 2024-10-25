<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolePermissionController;

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('users', UserController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});


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


Route::resource('users', UserController::class)->middleware(['auth', 'verified']);
Route::resource('clients', ClientController::class)->middleware(['auth', 'verified']);