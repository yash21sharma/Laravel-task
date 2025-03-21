@extends('layouts.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Post</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Post</li>
        </ol>
        <div class="d-flex align-items-center justify-content-between mt-4">
            <a href="{{ url('/posts/add') }}" class="btn btn-primary">Add Post</a>
        </div>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Post
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->user }}</td>
                            <td>{{ $post->category }}</td>
                            <td>{{ $post->title }}</td>
                            <td><img src="{{ asset($post->image_path) }}" alt="{{ $post->name }}" width="100" height="100">
                            </td>
                            <td>
                            <a href="{{ url('/post/edit/'.$post->id) }}"><i class="uil uil-edit"></i></a>
                               <form method="POST" action="{{ url('/post/delete/'.$post->id) }}" style="display: inline;">
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
