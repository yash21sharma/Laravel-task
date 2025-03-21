<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RazorpayPaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $totalAmount = $cartItems->sum(fn($item) => $item->quantity * $item->product->price) * 100; // Convert to paisa

        $order = $api->order->create([
            'receipt' => 'ORDER_' . rand(1000, 9999),
            'amount' => $totalAmount,
            'currency' => 'INR',
            'payment_capture' => 1
        ]);

        Session::put('razorpay_order_id', $order->id);
        Session::put('total_price', $totalAmount / 100);

        return view('checkout.razorpay', [
            'orderId' => $order->id,
            'totalAmount' => $totalAmount,
            'razorpayKey' => env('RAZORPAY_KEY')
        ]);
    }

    public function success(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $totalPrice = Session::get('total_price');

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'completed',
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product->id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);
        }

        // Clear cart
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('order.success', $order->id)->with('success', 'Payment successful! Order placed.');
    }

    public function handlePaymentSuccess(Request $request)
{
    $paymentId = $request->input('razorpay_payment_id');
    $amount = $request->input('amount'); // Ensure amount matches the order total

    // Save order in database
    $order = Order::create([
        'user_id' => Auth::id(),
        'total_price' => $amount,
        'payment_id' => $paymentId,
        'payment_status' => 'completed',
        'status' => 'processing', 
    ]);

    return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully!');
}


}
