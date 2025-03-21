@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="mb-4 text-center text-primary">📦 My Orders</h2>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>Order ID</th>
                                    <th>Total Amount</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr class="text-center">
                                    <td>#{{ $order->id }}</td>
                                    <td class="fw-bold">₹{{ number_format($order->total_amount, 2) }}</td>
                                    <td>
                                        <span class="badge {{ $order->payment_status == 'paid' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $order->order_status == 'delivered' ? 'bg-success' : ($order->order_status == 'pending' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                            {{ ucfirst($order->order_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
