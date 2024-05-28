<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Models\Product;

class OrderController extends Controller
{
    public function addToOrder($productId)
    {
        $product = Product::find($productId);

        return response()->json($products, 200);

    }

    public function getOrderAmount()
    {

    }

}