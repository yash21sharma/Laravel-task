@extends('frontend-template.layout.app')

@section('content')
<!-- Blog Start -->
<div class="blog_main">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="blog_text">{{ $category->name }}</h1>
            </div>
        </div>
        <div class="row">
            @foreach($post as $post)
            <div class="col-sm-4">
                <div class="blog_section_2">
                    <div class="section_1">
                        <div>
                            <img src="{{ asset($post->image_path) }}" style="max-width: 100%;">
                        </div>
                        <button type="button" class="date-bt">{{ $post->title }}</button>
                        <p>{{ $post->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Blog End -->
@endsection
