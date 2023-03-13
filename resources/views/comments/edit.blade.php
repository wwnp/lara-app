@extends('layouts.global')
@extends('layouts.main-foredit')
@section('content')
    <x-form method="put" action="{{ route('comments.update', [ $comment->id ]) }}">
        @bind($comment)
            <x-form-input name="nickname" label="Nickname" />
            <x-form-textarea name="body" label="Body"/>
            <button class="btn btn-primary mt-3">Edit</button>
        @endbind
    </x-form>
@endsection
