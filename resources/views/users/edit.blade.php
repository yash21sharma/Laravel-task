@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-gray-800 text-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Edit User</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="w-full px-4 py-2 text-black rounded">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-2 text-black rounded">
        </div>
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
