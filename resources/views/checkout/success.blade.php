@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <h2 class="text-success mb-4">🎉 Order Successful!</h2>
                    
                    <p class="fs-5">Thank you for your purchase! Your order ID is 
                        <strong class="text-primary">#{{ $order->id }}</strong>.
                    </p>

                    <h3 class="mt-4">Order Summary</h3>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-3">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr class="text-center">
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>₹{{ number_format($item->price, 2) }}</td>
                                    <td class="fw-bold">₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h4 class="text-end mt-3 fw-bold">Total: ₹{{ number_format($order->total_price, 2) }}</h4>

                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg mt-3">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
