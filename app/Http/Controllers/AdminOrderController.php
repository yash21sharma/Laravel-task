<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
public function index()
{
    $orders = Order::all();
    return view('admin.orders.index', compact('orders'));
}

public function update(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->update(['order_status' => $request->order_status]);

    return redirect()->back()->with('success', 'Order status updated.');
}
}
