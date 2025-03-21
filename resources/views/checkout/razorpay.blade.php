@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <h2 class="mb-4">Razorpay Payment</h2>
                    
                    <h4 class="text-primary mb-3">Total Amount: 
                        <span class="badge bg-success fs-5">₹{{ number_format($totalAmount / 100, 2) }}</span>
                    </h4>

                    <form id="razorpay-form">
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ $razorpayKey }}"
                            data-amount="{{ $totalAmount }}"
                            data-currency="INR"
                            data-order_id="{{ $orderId }}"
                            data-buttontext="Pay Now"
                            data-name="My Store"
                            data-description="Complete your payment"
                            data-theme.color="#28a745">
                        </script>
                    </form>

                    <a href="{{ route('cart.index') }}" class="btn btn-secondary mt-4">Back to Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
