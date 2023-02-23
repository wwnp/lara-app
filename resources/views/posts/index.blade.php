@extends('layouts.global')
@extends('layouts.main')
@section('content')
    <h1>POSTS</h1>
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
    <div class="d-flex justify-content-center">
        {!! $posts->appends(['page' => 1])->links() !!}
        {{-- {{!! $posts->appends(['page' => 1])->links('pagination::default') !!}} --}}
    </div>
@endsection