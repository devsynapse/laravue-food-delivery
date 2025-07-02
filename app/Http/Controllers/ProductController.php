<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Models\Product;
use App\Models\Addon;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::take(20)->get());
    }

    public function getProduct(int $productId): ProductResource
    {
        return new ProductResource(Product::findOrFail($productId));
    }

    public function getPopularProducts(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::take(4)->get());
    }

    public function findProducts(string $searchString): JsonResponse
    {
        $products = Product::where('name', 'LIKE', '%'.$searchString.'%')->get();

        return response()->json($products);
    }

    public function getProductAddons(int $productId)
    {
        $product = Product::findOrFail($productId);

        
    }
}
