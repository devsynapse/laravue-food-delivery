<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        if (!$request->has('product_id')) {
            return response()->json(['message' => 'not found'], 404); 
        }

        $product = Product::find($request->post('product_id'));

        if (empty($product)) {
            return response()->json(['message' => 'not found'], 404); 
        }

        $cartProducts = session('cart') ?? [];
        
        if (isset($cartProducts[$product->id])) {
            $cartProducts[$product->id] += 1;
        } else {
            $cartProducts[$product->id] = 1;
        }
        
        session(['cart' => $cartProducts]);

        return response()->json($product, 200);

    }

    public function getCartAmount()
    {
        $result = 0;

        if (!empty(session('cart'))) {
            $result = array_sum(session('cart'));
        }

        return $result;
    }

    public function getCartProducts()
    {
        $products = [];
        
        if (!empty(session('cart'))) {
            $productsInCart = session('cart');
            $productsIds = array_keys($productsInCart);

            $productsData = Product::whereIn('id', $productsIds)->get();

            foreach($productsData as $productData) {
                $products[] = [
                    'id' => $productData->id,
                    'qty' => $productsInCart[$productData->id],
                    'name' => $productData->name,
                    'img_url' => $productData->img_url,
                    'price' => $productData->price,

                ];
            }
        }

        return response()->json($products, 200);
    }

}