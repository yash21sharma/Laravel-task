@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Admin Dashboard</h1>
    <div class="row text-center">
        <div class="col-md-3">
            <div class="card shadow bg-info text-white p-3 rounded">
                <h4><i class="fas fa-shopping-cart"></i> Total Orders</h4>
                <p class="fs-4 fw-bold">{{ $totalOrders }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow bg-success text-white p-3 rounded">
                <h4><i class="fas fa-users"></i> Total Users</h4>
                <p class="fs-4 fw-bold">{{ $totalUsers }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow bg-warning text-white p-3 rounded">
                <h4><i class="fas fa-box"></i> Total Products</h4>
                <p class="fs-4 fw-bold">{{ $totalProducts }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow bg-danger text-white p-3 rounded">
                <h4><i class="fas fa-dollar-sign"></i> Total Revenue</h4>
                <p class="fs-4 fw-bold">${{ number_format($totalRevenue, 2) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
