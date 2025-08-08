<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/', function () {
    return view('frontend.dashboard.home');
});

Route::get('/product', [ProductController::class, 'products'])->name('list_product');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/Cate', [ProductController::class, 'searchCate'])->name('products.searchCate');

// Contact
Route::get('/contact', [ContactController::class, 'contact'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Cart routes
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', function () {
        return view('frontend.checkout');
    })->name('checkout');
    Route::post('/cart/merge', [CartController::class, 'merge'])->name('cart.merge');
});

Route::get('/check-auth', [CartController::class, 'checkAuth']);