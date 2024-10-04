<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CupcakeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\CupcakeAdminController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/cupcakes', [CupcakeController::class, 'index']);
Route::get('/', [CupcakeController::class, 'index']);

// Rotas do painel administrativo
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard'); 
    Route::get('/admin/orders', [OrderAdminController::class, 'index'])->name('admin.orders.index'); 
    Route::resource('/admin/cupcakes', CupcakeAdminController::class);
});

// Rotas adicionais
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/cart', [CartController::class, 'viewCart']);
    Route::post('/add-to-cart', [CartController::class, 'addToCart']);
    Route::post('/update-cart', [CartController::class, 'updateCart']);
    Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart']);
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    //Route::get('/orders', [OrderController::class, 'index']);
});
