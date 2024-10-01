<?php

use App\Http\Controllers\CupcakeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::get('/cart', [CartController::class, 'viewCart']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/cupcakes', [CupcakeController::class, 'index']);
