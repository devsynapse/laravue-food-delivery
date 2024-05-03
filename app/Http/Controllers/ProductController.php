<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json([      
            ['name' => 'chiken'],
            ['name' => 'beef'],
            ['name' => 'fish'],         
        ], 200);
    }

    public function getProduct($productId)
    {
        return response()->json([
            ['name' => 'chiken'],
            ['name' => 'beef'],
            ['name' => 'fish'],
        ], 200);
    }
}
