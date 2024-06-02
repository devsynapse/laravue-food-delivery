<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get("/products", [ProductController::class, 'index']);
Route::get("/products/{product_id}", [ProductController::class, 'getProduct']);
Route::get("/popular-products", [ProductController::class, 'getPopularProducts']);
Route::get("/find-products/{searchString}", [ProductController::class, 'findProducts']);
Route::get("/cart", [CartController::class, 'getCartProducts']);
Route::get("/orders", [OrderController::class, 'index']);
Route::post("/order", [OrderController::class, 'store']);
