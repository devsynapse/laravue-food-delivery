<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get("/products", [ProductController::class, 'index']);
Route::get("/products/{product_id}", [ProductController::class, 'getProduct']);
Route::get("/popular-products", [ProductController::class, 'getPopularProducts']);
Route::get("/find-products", [ProductController::class, 'findProducts']);