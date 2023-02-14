@extends('layouts.main', ["title" => "xczxczx"])
@section('content')
<h1>POSTS</h1>

@foreach ($posts as $post)
    <h1>{{ $post->title }}</h1>
    <h1>{{ $post->content }}</h1>
    <h1>{{ $post->category->title }}</h1>
    {{-- <a href="{{ route('posts.show',$post->id) }}">go into</a> --}}
    <hr>
@endforeach


@endsection