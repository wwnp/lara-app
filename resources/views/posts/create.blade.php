@extends('layouts.global')
@extends('layouts.main')
@section('content')
<h1>CREATE</h1>
<x-form method="post" action="{{ route('posts.store') }}">
    @include('posts.form-fields')
    <button class="btn btn-success mt-2">Create</button>
    
</x-form>
@endsection
