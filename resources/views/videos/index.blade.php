@extends('layouts.main', ["title" => "xczxczx"])
@section('content')
    <a href="{{ route('videos.create') }}">Добавить видео</a>
    <hr>
    @foreach($videos as $video)
        <h2>{{ $video->code }}</h2>
        <em>{{ $video->created_at }}</em><br>
        <a href="{{ route('videos.show', [ $video->id ]) }}">more...</a>
        <hr>
    @endforeach
@endsection