@extends('layouts.global')
@extends('layouts.main')
@section('content')
    <x-form method="post" action="{{ route('tags.store') }}">
        @include('tags.form-fields')
        <button  class="btn btn-success">Create</button>
    </x-form>
@endsection