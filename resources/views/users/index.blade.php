@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-gray-800 text-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Manage Users</h2>
    <table class="w-full border-collapse border border-gray-700">
        <thead>
            <tr class="bg-gray-700">
                <th class="border border-gray-600 px-4 py-2">ID</th>
                <th class="border border-gray-600 px-4 py-2">Name</th>
                <th class="border border-gray-600 px-4 py-2">Email</th>
                <th class="border border-gray-600 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-gray-900">
                <td class="border border-gray-600 px-4 py-2">{{ $user->id }}</td>
                <td class="border border-gray-600 px-4 py-2">{{ $user->name }}</td>
                <td class="border border-gray-600 px-4 py-2">{{ $user->email }}</td>
                <td class="border border-gray-600 px-4 py-2 flex space-x-2">
                <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
