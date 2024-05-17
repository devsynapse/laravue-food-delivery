<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::take(20)->get();

        return response()->json($products, 200);
    }

    public function getProduct(int $productId): JsonResponse
    {
        $product = Product::find($productId);

        return response()->json($product, 200);
    }

    public function getPopularProducts(): JsonResponse
    {
        $products = Product::take(4)->get();

        return response()->json($products, 200);
    }

    public function findProducts(string $searchString): JsonResponse
    {
        
    }
}
