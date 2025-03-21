@extends('layouts.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
        <div class="d-flex align-items-center justify-content-between mt-4">
            <a href="{{ url('/category/add') }}" class="btn btn-primary">Add Category</a>
        </div>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Category
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($category as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td><img src="{{ asset($category->image_path) }}" alt="{{ $category->name }}" width="100" height="100">
                            </td>
                            <td>
                            <a href="{{ url('/category/edit/'.$category->id) }}"><i class="uil uil-edit"></i></a>
                               <form method="POST" action="{{ url('/category/delete/'.$category->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background: none; cursor: pointer;"><i class="uil uil-trash-alt"></i></button>
                               </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
