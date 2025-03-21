@extends('Layouts.app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Category</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/slider')}}">Category</a></li>
                <li class="breadcrumb-item active">Add Slider</li>
            </ol>
        </div>
        <div class="d-flex align-items-center justify-content-center" style="height: 50vh;">
            <div class="col-md-6">
                <form action="{{ url('/slider/add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label for="title" class="col-form-label">Title :</label>
                        </div>
                        <div class="col-10"> 
                            <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" type="text" />
                        </div>
                    @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    </div>
                    </div>
                    <div class="form-floating mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label for="description" class="col-form-label">Description :</label>
                        </div>
                        <div class="col-10"> 
                            <input class="form-control @error('description') is-invalid @enderror" id="description" name="description" type="text" />
                        </div>
                    @error('description')
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