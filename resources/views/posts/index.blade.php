@extends('layouts.global')
@extends('layouts.main')
@section('content')
<div class="grid-container">
    <div class="header-section bg-dark-custom text-white custom-border-left">
        <div class="custom-container">
            <h1 class="auto-scaling-title">
            <span class="tag-wrapper">IT Infrastructure</span>
            <span> Articles</span></h1>
            <h2 class="header-description">Articles provide conceptual and explanatory information that describe a technology or help complete a task.</h2>
        </div>
    </div>
    <div class="article-section-half">
        <div class="list-group">
            @foreach ($posts as $post)
                <div class="mb-3">
                    <a href="{{ route('posts.show',$post->id) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $post->title }}</h5>
                        <small>{{$post->created_at  }}</small>
                        </div>
                        <p class="mb-1">{{ $post->category->title }}</p>
                        <p class="mb-1">Comments: {{$post->comments_count}} </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="article-section-half">
    </div>
    <div class="footer-section">
        <div class="d-flex justify-content-center">
            {!! $posts->appends(['page' => 1])->links() !!}
        </div>
    </div>
</div>

@endsection