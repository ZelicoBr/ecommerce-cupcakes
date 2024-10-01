<?php

use App\Http\Controllers\CupcakeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/cupcakes', [CupcakeController::class, 'index']);
Route::get('/', [CupcakeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'viewCart']);
    Route::post('/add-to-cart', [CartController::class, 'addToCart']);
    Route::post('/update-cart', [CartController::class, 'updateCart']);
    Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart']);
    //Route::get('/checkout', [CheckoutController::class, 'index']);
});
