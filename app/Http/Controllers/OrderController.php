<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
{
    $orders = Order::where('user_id', Auth::id())->get();
    return view('orders.index', compact('orders'));
}

public function show($id)
{
    $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    return view('orders.show', compact('order'));
}

public function dashboard()
{
    $recentOrders = Order::where('user_id', Auth::id())->orderBy('id','desc')->limit(10)->get();
    return view('dashboard', compact('recentOrders'));
}

}
