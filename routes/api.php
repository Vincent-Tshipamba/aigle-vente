<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
