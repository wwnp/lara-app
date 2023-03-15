@extends('layouts.global')
@extends('layouts.main-foredit')
@section('content')
<h1>Создать пост</h1>
<x-form method="post" action="{{ route('posts.store') }}">
    <div class="container-fluid">
        @include('posts.form-fields')
        <button class="btn btn-success mt-2">Create</button>
    </div>
</x-form>
@endsection
