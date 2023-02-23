@extends('layouts.global')
@extends('layouts.main')
@section('content')
    @bind($tag)
        <x-form method="put" action="{{ route('tags.update', [ $tag->id ]) }}">
            @include('tags.form-fields')
            <button class="btn btn-info">Update</button>
        </x-form>
    @endbind
@endsection