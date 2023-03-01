@extends('layouts.global')
@extends('layouts.another')
@section('content')
<div class="container ">
    <div class="row justify-content-center align-items-center">
        <div class="col-10 col-lg-4" style="z-index:1; position:relative">
            <div class="card mt-5 p-2" >
                <div class="card-header text-center">
                    Login
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf
                        <div class="mb-3">
                            <x-form-input name="email" type="email" label="Email"></x-form-input>
                        </div>
                        <div class="mb-3">
                            <x-form-input name="password" label="Password" type="password"></x-form-input>
                        </div>
                        <div class="mb-3">
                            <x-form-checkbox name="remember" label="Remember" checked />
                        </div>
                        <div class="mb-3">
                            <x-recaptcha name="g-recaptcha-response" > </x-recaptcha>
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