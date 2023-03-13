@extends('layouts.global')
@extends('layouts.main-foredit')
@section('content')
@bind($comments)
@include('comments.table')
@endbind
@endsection