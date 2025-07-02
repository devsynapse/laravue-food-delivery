<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Models\Product;
use App\Models\Addon;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
     /**
     * Get a list of 20 products.
     */
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::take(20)->get());
    }

    /**
     * Get a single product by ID.
     */
    public function getProduct(int $productId): ProductResource
    {
        return new ProductResource(Product::findOrFail($productId));
    }

    /**
     * Get the top 4 products (e.g., popular).
     */
    public function getPopularProducts(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::take(4)->get());
    }

    /**
     * Find products by name using a search string.
     */
    public function findProducts(string $searchString): AnonymousResourceCollection
    {
        $products = Product::where('name', 'LIKE', '%'.$searchString.'%')->get();
        return ProductResource::collection($products);
    }

    /**
     * Get addons related to a specific product.
     */
    public function getProductAddons(int $productId)
    {
        //$product = Product::findOrFail($productId); 
    }
}
