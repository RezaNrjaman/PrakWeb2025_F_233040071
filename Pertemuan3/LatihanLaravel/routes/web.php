<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/about', function () {
    return view('about');
})->middleware('auth');

Route::get('/blog', function () {
    return view('blog');
})->middleware('auth');

Route::get('/posts', function () {
    return view('posts');
})->middleware('auth');

Route::get('/categories', function () {
    return view('categories');
})->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
})->middleware('auth');




// Route post dan categories dengan auth middleware
// Route dari laraveltest-main
Route::get('post', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

// Route model binding dengan slug
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');
Route::get('/categories', [CategoryController::class, 'index']);

// Route untuk register - middleware guest (hanya untuk user yang belum login)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

// Route untuk login - middleware guest (hanya untuk user yang belum login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

// Route logout - hanya user yang sudah login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
