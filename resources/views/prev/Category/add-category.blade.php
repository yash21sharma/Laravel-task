@extends('Layouts.app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Category</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/category')}}">Category</a></li>
                <li class="breadcrumb-item active">Add category</li>
            </ol>
        </div>
        <div class="d-flex align-items-center justify-content-center" style="height: 50vh;">
            <div class="col-md-6">
                <form action="{{ url('/category/add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label for="name" class="col-form-label">Name:</label>
                        </div>
                        <div class="col-10"> 
                            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" />
                        </div>
                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    </div>
                    </div>
                    <div class="form-floating mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label for="image" class="col-form-label">Image:</label>
                        </div>
                        <div class="col-10"> 
                            <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" type="file" />
                        </div>
                    </div>
                    @error('image')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection