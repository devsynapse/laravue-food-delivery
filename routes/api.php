<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get("/products", [ProductController::class, 'index']);
Route::get("/products/{product_id}", [ProductController::class, 'getProduct']);
Route::get("/popular-products", [ProductController::class, 'getPopularProducts']);
Route::get("/find-products/{searchString}", [ProductController::class, 'findProducts']);
Route::post("/cart/add", [CartController::class, 'addToCart']);
Route::get("/cart/amount", [CartController::class, 'getCartAmount']);
Route::get("/cart", [CartController::class, 'getCartProducts']);