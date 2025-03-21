@extends('Layouts.app');
@section('content');
<main>
        <div class="container-fluid px-4" style="position: relative;">
            <h1 class="mt-4" style="position: absolute; top: -50px; left: 30px;">Add Post</h1>
            <ol class="breadcrumb mb-4" style="position: absolute; top: 30px; left: 30px;">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('/post') }}">Post</a></li>
                <li class="breadcrumb-item active">Add Post</li>
            </ol>
        </div>

        <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="col-md-6">
                <form action="{{ url('/posts/add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label for="user" class="col-form-label">Select an user:</label>
                        </div>
                        <div class="col-10"> 
                        <select class="form-control @error('user') is-invalid @enderror" id="user" name="user">
                            <option value="select">Select user</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->firstname }}</option>
                            @endforeach
                        </select>
                        </div>
                    @error('user')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    </div>
                    </div>
                    <div class="form-floating mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label for="category" class="col-form-label">Select a category:</label>
                        </div>
                        <div class="col-10"> 
                        <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                        <option value="select">Select category</option>
                            @foreach($category as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        </div>
                    @error('category')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    </div>
                    </div>
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
                    </div><div class="form-floating mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label for="description" class="col-form-label">Description:</label>
                        </div>
                        <div class="col-10"> 
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" cols="50"></textarea>
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
@endsection;