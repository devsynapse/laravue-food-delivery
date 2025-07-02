<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Enums\OrderStatus;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a list of all orders with their products.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $orders = Order::with('products')->get();
        return OrderResource::collection($orders);
    }

    /**
     * Display a specific order with its products.
     */
    public function getOrder(int $orderId): OrderResource
    {
        $order = Order::with('products')->findOrFail($orderId);
        return new OrderResource($order);
    }

    /**
     * Store a new order and attach selected products.
     */
    public function store(StoreOrderRequest $request): int|JsonResponse
    {
        $orderData = $request->validated();
        $orderData['status'] = OrderStatus::NEW->value;

        $order = Order::create($orderData);
        
        $orderProducts = [];

        if (!$request->has('products') || empty($request->products)) {
            return response()->json(['error' => 'No products provided'], 422);
        }
        
        foreach($request->post('products') as $productData) {
            $product = Product::find($productData['id']);

            if (!$product) {
                continue;
            }

            $orderProducts[$productData['id']] = [
                'qty' => $productData['qty'],
                'price' => $product->price,
                'total' => $product->price * $productData['qty'],
            ];
        }
        
        $order->products()->attach($orderProducts);

        return $order->id;
    }

    /**
     * Update the status of an existing order.
     */
    public function update(UpdateOrderRequest $request, int $orderId): int
    {
        $order = Order::findOrFail($orderId);
        $validated = $request->validated();

        if (isset($validated['status'])) {
            $order->status = $validated['status'];
        }

        $order->save();

        return $order->id;
    }

    /**
     * Get the products associated with a specific order.
     */
    public function getOrderProducts(int $orderId): JsonResponse
    {
        $order = Order::findOrFail($orderId);
        
        return response()->json($order->products);
    }

}