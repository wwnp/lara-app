@extends('layouts.global')
@extends('layouts.main-foredit')
@section('content')
<h1>EDIT CATEGORIES</h1>
<x-form method="put" action="{{ route('categories.update', [ $category->id ] ) }}">
    @bind($category)
    @include('categories.form-fields')
    <button>Update</button>
    @endbind
</x-form>
@endsection