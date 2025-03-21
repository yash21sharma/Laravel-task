@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Checkout</h2>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-3">Order Summary</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                <tr class="text-center align-middle">
                                    <td class="fw-semibold">{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>₹{{ number_format($item->product->price, 2) }}</td>
                                    <td class="fw-bold">₹{{ number_format($item->quantity * $item->product->price, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h4 class="text-end mt-3 fw-bold">Total: ₹{{ number_format($totalPrice, 2) }}</h4>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h4 class="mb-3">Payment</h4>

                    <form action="{{ route('checkout.payment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="amount" value="{{ $totalPrice * 100 }}">  <!-- Convert to paisa -->
                        <button type="submit" class="btn btn-success btn-lg w-100">Pay with Razorpay</button>
                    </form>

                    <a href="{{ route('cart.index') }}" class="btn btn-secondary mt-3 w-100">Back to Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
