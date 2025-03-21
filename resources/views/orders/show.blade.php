@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="text-success text-center mb-4">🛒 Order Details</h2>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Order ID:</strong> <span class="text-primary">#{{ $order->id }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Total Amount:</strong> <span class="fw-bold">₹{{ number_format($order->total_amount, 2) }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Payment Status:</strong> 
                            <span class="badge {{ $order->payment_status == 'paid' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <strong>Order Status:</strong> 
                            <span class="badge {{ $order->order_status == 'delivered' ? 'bg-success' : ($order->order_status == 'pending' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                {{ ucfirst($order->order_status) }}
                            </span>
                        </li>
                    </ul>

                    <div class="text-center mt-4">
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
