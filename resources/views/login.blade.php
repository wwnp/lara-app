@extends('layouts.global')
@extends('layouts.another')
@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-4" style="z-index:1; position:relative">
            <div class="card mt-5 p-2" >
                <div class="card-header text-center">
                    Login
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <x-form-input name="email" label="Email"></x-form-input>
                        </div>
                        <div class="mb-4">
                            <x-form-input name="password" label="Password" type="password"></x-form-input>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection