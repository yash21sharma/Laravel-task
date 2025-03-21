@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white text-center">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description:</label>
                            <textarea name="description" class="form-control" placeholder="Enter product description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Price:</label>
                            <input type="number" step="0.01" name="price" class="form-control" placeholder="Enter product price" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Stock:</label>
                            <input type="number" name="stock" class="form-control" placeholder="Enter stock quantity" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Image:</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-3 px-4">Save Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection