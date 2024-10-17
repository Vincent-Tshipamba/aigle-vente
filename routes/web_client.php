<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

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

Route::get('/blog', function () {
    return view('blog.blog');
})->name('blog');

Route::get('/blog-detail', function () {
    return view('blog.blog-details');
})->name('blog-details');
