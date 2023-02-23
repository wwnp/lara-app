@extends('layouts.global')
@extends('layouts.main')
@section('content')
<h1>EDIT</h1>
<x-form method="put" action="{{ route('posts.update', [ $post->id ] ) }}">
    @bind($post)
    @include('posts.form-fields')
    <button>Update</button>
    @endbind
</x-form>
@endsection