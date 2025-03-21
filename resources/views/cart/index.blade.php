@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Shopping Cart</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($cartItems->isEmpty())
        <div class="alert alert-warning text-center">Your cart is empty.</div>
        <div class="text-center">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>Image</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr class="align-middle text-center">
                        <td>
                            <img src="{{ asset('storage/'.$item->product->image) }}" width="60" class="img-thumbnail" alt="{{ $item->product->name }}">
                        </td>
                        <td class="fw-semibold">{{ $item->product->name }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex justify-content-center">
                                @csrf
                                <input type="number" name="quantity" class="form-control w-50 text-center" value="{{ $item->quantity }}" min="1">
                                <button type="submit" class="btn btn-sm btn-outline-primary ms-2">Update</button>
                            </form>
                        </td>
                        <td>${{ number_format($item->product->price, 2) }}</td>
                        <td class="fw-bold">${{ number_format($item->quantity * $item->product->price, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <h4 class="fw-bold">Total: ${{ number_format($cartItems->sum(fn($item) => $item->quantity * $item->product->price), 2) }}</h4>
            <a href="{{ route('checkout.index') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Continue Shopping</a>
        </div>
    @endif
</div>
@endsection
