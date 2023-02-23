@extends('layouts.global')
@extends('layouts.main')
@section('content')
@bind($comments)
@include('comments.table')
@endbind
@endsection