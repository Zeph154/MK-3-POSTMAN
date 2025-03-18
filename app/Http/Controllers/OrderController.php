<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        $order = Order::create($validated);

        return response()->json($order, 201); // 201: Created
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_id' => 'integer',
            'quantity' => 'integer|min:1',
            'total_price' => 'numeric|min:0',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return response()->json($order);
    }


    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}