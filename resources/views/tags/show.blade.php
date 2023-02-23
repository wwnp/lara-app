@extends('layouts.global')
@extends('layouts.main')
@section('content')
    {{-- <div>{{ $tag->status->text() }}</div> --}}
    <a href="/tags">Back</a>
    <hr>
    <em>{{ $tag->created_at }}</em>
    <h3>{{ $tag->title }}</h3>
    <a href="{{ route('tags.edit', [ $tag->id ]) }}">Edit</a>
    <hr>
    <h2>Comments</h2>
    {{-- <x-comments.form for="tag" :id="$tag->id" /> --}}
    <hr>
    {{-- <x-comments.list :comments="$tag->comments" /> --}}
@endsection