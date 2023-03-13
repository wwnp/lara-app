@extends('layouts.global')
@extends('layouts.main-foredit')
@section('content')
<h1>Create category</h1>
<x-form method="post" action="{{ route('categories.store') }}">
    @include('categories.form-fields')
    <button class="btn btn-success mt-2">Create</button>
</x-form>
@endsection
