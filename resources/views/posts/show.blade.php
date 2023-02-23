@extends('layouts.global')
@extends('layouts.main')
@section('content')
<article>
    <header class="mb-4">
      <h1 class="text-center">{{ $post->title }}</h1>
      <p class="text-muted text-center">Written by John Doe on June 1, 2022</p>
    </header>
    <section>
        <p>{{ $post->content }}</p>
    </section>
    <footer class="mt-4">
        @foreach ($tags as $tag)
            <x-badge >{{$tag->title}}</x-badge>
        @endforeach
    </footer>
</article>

{{-- <div class="d-flex flex-row">
    <div class="p-2">
        <a class="btn btn-info" href="{{ route('posts.edit', $post->id) }}">Edit article</a>
    </div>
    <div class="p-2">
        <form method="post" action="{{ route('posts.destroy', [ $post->id ]) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
</div> --}}
<hr />

<h5>Comments:</h5>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <x-comments.form for="post" :id="$post->id" />
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <x-comments.list :comments="$comments"></x-comments.list>
        </div>
    </div>
</div>
@endsection
