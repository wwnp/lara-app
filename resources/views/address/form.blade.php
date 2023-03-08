@extends('layouts.global')
@extends('layouts.main-foredit')
@section('content')
<h1>Address</h1>
<x-form method="post" action="{{ route('address.parse') }}">
    <div class="container-fluid">
        <x-form-input name="address" label="Address" type="text" />
        <button class="btn btn-success mt-2">Send</button>
    </div>
</x-form>
@endsection



