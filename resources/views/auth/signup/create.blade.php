@extends('layouts.global')
@extends('layouts.another')
@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-10 col-lg-4" style="z-index:1; position:relative">
            <div class="card mt-5 p-2" >
                <div class="card-header text-center">
                    Регистрация
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('signup.store') }}">
                        @csrf
                        <div class="mb-3">
                            <x-form-input name="name" type="text" label="Имя" value="test"></x-form-input>
                        </div>
                        <div class="mb-3">
                            <x-form-input name="email" type="email" label="Электронная почта" value="admin@example.com"></x-form-input>
                        </div>
                        <div class="mb-3">
                            <x-form-input name="password" label="Пароль" type="password" value="123q"></x-form-input>
                        </div>
                        <div class="mb-3">
                            <x-form-input name="password_confirmation" label="Подтвердить пароль" type="password" required value="123q"></x-form-input>
                        </div>
                        <div class="mb-3">
                            <x-form-checkbox name="remember" label="Запомнить" checked />
                        </div>
                        {{-- <div class="mb-3">
                            <x-recaptcha name="g-recaptcha-response" > </x-recaptcha>
                        </div> --}}
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection