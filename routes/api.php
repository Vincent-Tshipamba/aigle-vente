<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route to redirect to Google's OAuth page
Route::get('/auth/google/redirect', [AuthenticatedSessionController::class, 'redirect'])->name('auth.google.redirect');

// Route to handle the callback from Google
Route::get('/auth/google/callback', [AuthenticatedSessionController::class, 'callback'])->name('auth.google.callback');
