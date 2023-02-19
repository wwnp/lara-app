{{-- @php
    dd($comments);
@endphp --}}
@extends('layouts.main', ["title" => "xczxczx"])
@section('content')
@bind($comments)
@include('comments.table')
@endbind
@endsection