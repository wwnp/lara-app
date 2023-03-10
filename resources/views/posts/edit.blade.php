@extends('layouts.global')
@extends('layouts.main-foredit')
@section('content')
<h1>EDIT</h1>
<x-form method="put" action="{{ route('posts.update', [ $post->id ] ) }}">
    @bind($post)
    <div class="container-fluid">
        @include('posts.form-fields')
        <button class="btn btn-success mt-2">Update</button>
    </div>
    @endbind
</x-form>
@endsection