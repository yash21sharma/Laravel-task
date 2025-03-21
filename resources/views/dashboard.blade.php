@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Welcome Message -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md flex items-center text-white rounded-full">
                <h1 class="text-4xl font-extrabold tracking-wide block leading-relaxed">Welcome back, {{ Auth::user()->name }}! 👋</h1>

            </div>

            <!-- Quick Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-800 p-6 rounded-lg shadow-md flex items-center">
                    <div class="p-3 bg-blue-500 text-white rounded-full">
                        <i class="fas fa-shopping-cart text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold">Total Orders</h2>
                        <p class="text-2xl font-bold">{{ $orderCount ?? 0 }}</p>
                    </div>
                </div>

                <div class="bg-gray-800 p-6 rounded-lg shadow-md flex items-center">
                    <div class="p-3 bg-green-500 text-white rounded-full">
                        <i class="fas fa-dollar-sign text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold">Revenue</h2>
                        <p class="text-2xl font-bold">${{ number_format($totalPayment ?? 0, 2) }}</p>
                    </div>
                </div>

                <div class="bg-gray-800 p-6 rounded-lg shadow-md flex items-center">
                    <div class="p-3 bg-yellow-500 text-white rounded-full">
                        <i class="fas fa-user text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold">Total Users</h2>
                        <p class="text-2xl font-bold">{{ $userCount ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Navigation Buttons -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
                <div class="flex space-x-4">
                    <a href="{{ route('orders.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                        <i class="fas fa-list text-yellow-300"></i> View Orders
                    </a>
                    <a href="{{ route('users.index') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                        <i class="fas fa-users text-red-300"></i> View Users
                    </a>
                    <a href="{{ route('products.index') }}" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-md">
                        <i class="fas fa-box text-cyan-300"></i> View Products
                    </a>
                    <a href="{{ route('cart.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md">
                        <i class="fas fa-shopping-cart text-green-300"></i> View Cart
                    </a>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Recent Orders</h2>
                <table class="w-full border-collapse">
                @if($recentOrders->isNotEmpty())
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="p-3 text-left">Order ID</th>
                            <th class="p-3 text-left">User</th>
                            <th class="p-3 text-left">Amount</th>
                            <th class="p-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                        <tr class="border-b border-gray-600">
                            <td class="p-3">{{ $order->id }}</td>
                            <td class="p-3">{{ $order->user->name }}</td>
                            <td class="p-3">${{ number_format($order->total_amount, 2) }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 text-sm rounded 
                                    {{ $order->status == 'delivered' ? 'bg-green-500 text-white' : 'bg-yellow-500 text-black' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                        @else
        {{-- Handle the case where either folders or albums response code is not '200' --}}
        <p>No data available.</p>
    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
