@extends('layouts.global')
@extends('layouts.main')
@section('content')
<h1>SHOW</h1>
<h2>{{ $post->title }}</h2>
<h2>{{ $post->content }}</h2>


<form method="post" action="{{ route('posts.destroy', [ $post->id ]) }}">
    @csrf
    @method('DELETE')
    <button>Delete</button>
</form>
<hr />
<h3>CommentsAdmin:</h3>

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

// 
[
    comment => [
        comment,
        comment

    ]
]