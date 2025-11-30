<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/categories', function () {
    return view('categories');
});

// Route untuk menampilkan semua post
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Route untuk memanggil method di PostController
Route::get('/categories', [CategoryController::class, 'index']);
