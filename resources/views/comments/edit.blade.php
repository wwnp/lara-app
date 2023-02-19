@extends('layouts.main', ["title" => "xczxczx"])
@section('content')
@php
    // dd($comment);
@endphp
    <x-form method="put" action="{{ route('comments.update', [ $comment->id ]) }}">
        @bind($comment)
            <x-form-input name="nickname" label="Nickname" />
            <x-form-textarea name="body" label="Body"/>
            <button class="btn btn-primary mt-3">Edit</button>
        @endbind
    </x-form>
    {{-- <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <x-comments.form for="{{}}" :id="$comment->commentable->id" />
            </div>
        </div>
    </div> --}}
@endsection