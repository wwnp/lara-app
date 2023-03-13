@extends('layouts.global')
@extends('layouts.main-foredit')
@section('content')
<h1>POSTS</h1>

@foreach ($categories as $category)
    <h1>{{ $category->title }}</h1>
    <h1>{{ $category->slug }}</h1>
    {{-- <h1>{{ $post->category->title }}</h1> --}}
    <a href="{{ route('categories.edit',$category->id) }}">Изменить категорию</a>
    <hr>
@endforeach


@endsection