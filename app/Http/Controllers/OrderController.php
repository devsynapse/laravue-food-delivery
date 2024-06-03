<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::all();

        return response()->json($orders, 200);
    }

    public function store(Request $request)
    {
        return response()->json($request->all(), 200);

        $post = Order::create($request->validated());

        return $post->id;
    }

}