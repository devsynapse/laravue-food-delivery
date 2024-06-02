<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function getCartProducts(Request $request)
    {
        $products = [];

        if ($request->has('products')) {
            $productsIds = $request->get('products');

            $productsData = Product::whereIn('id', $productsIds)->get();

            foreach($productsData as $productData) {
                $products[] = [
                    'id' => $productData->id,
                    'name' => $productData->name,
                    'img_url' => $productData->img_url,
                    'price' => $productData->price,
                ];
            }
        }

        return response()->json($products, 200);
    }
}