@extends('layouts.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Category</li>
            <li class="breadcrumb-item active">Add category</li>
        </ol>
    </div>
    <div class="d-flex align-items-center justify-content-center" style="height: 50vh;">
        <div class="col-md-6">
            <form action="{{ $category ? url('/category/update/' . $category->id) : '' }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label for="name" class="col-form-label">Name:</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label for="image" class="col-form-label">Image:</label>
                        </div>
                        <div class="col-8">
                            <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" type="file" />
                            @error('image')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
