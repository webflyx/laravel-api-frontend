<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        return OrderResource::collection(Order::with('user')->get());
    }

    public function store(Request $request)
    {
        $order = Order::create([
            ...$request->validate([
                'coin' => 'required|string|min:1|max:10',
                'type' => 'required|in:buy,sell',
                'amount' => 'required|numeric|min:0.000000001',
                'price' => 'required|numeric|min:0.000000001',
            ]),
            'user_id' => 1,
        ]);

        return new OrderResource($order->load('user'));
    }

    public function show(Order $order)
    {
        return new OrderResource($order->load('user'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update([
            ...$request->validate([
                'coin' => 'sometimes|string|min:1|max:10',
                'type' => 'sometimes|in:buy,sell',
                'amount' => 'sometimes|numeric|min:0.000000001',
                'price' => 'sometimes|numeric|min:0.000000001',
            ]),
            'user_id' => 1,
        ]);

        return new OrderResource($order->load('user'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response(status: 204);
    }
}
