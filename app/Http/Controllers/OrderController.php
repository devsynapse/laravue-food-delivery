<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Models\Order;
use App\Http\Resources\OrderResource;
use App\Enums\OrderStatus;

class OrderController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        return OrderResource::collection(Order::all());
    }

    public function store(StoreOrderRequest $request)
    {
        $orderData = $request->validated();
        $orderData['status'] = OrderStatus::NEW->value;

        $order = Order::create($orderData);
        
        $orderProducts = [];

        if ($request->has('products')) {
            foreach($request->post('products') as $product) {
                $orderProducts[] = [
                    'product_id' => $product['id'],
                    'qty' => $product['qty'],
                    'price' => $product['price'],
                    'total' => $product['price'] * $product['qty'],
                ];
            }
        }

        $order->products()->attach($orderProducts);

        return $order->id;
    }

    public function update(UpdateOrderRequest $request, int $orderId)
    {
        $order = Order::find($orderId);
        $order->status = $request->safe()->only(['status']);
        $order->save();

        return $order->id;
    }

}