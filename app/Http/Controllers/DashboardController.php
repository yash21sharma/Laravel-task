<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::get()->count();
        $orderCount= Order::get()->count();
        $totalPayment = Order::sum('total_price');
        $recentOrders = Order::where('user_id', Auth::id())->orderBy('id','desc')->limit(10)->get();
        $users = User::orderBy('id','desc')->get();
        return view('dashboard', compact('userCount', 'orderCount', 'totalPayment', 'recentOrders', 'users'));
    }

//     public function dashboard()
// {
//     $recentOrders = Order::where('user_id', Auth::id())->orderBy('id','desc')->limit(10)->get();
//     return view('dashboard', compact('recentOrders'));
// }

// public function userIndex(){
//     $users = User::orderBy('id','desc')->get();
//     return view('/dashboard',compact('users'));
// }
}
