@extends('layouts.global')
@extends('layouts.another')
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-10 col-md-8"  style="z-index:1; position:relative">
        <div class="card shadow-lg">
            <div class="container">
          <div class="card-header">
            <h3 class="card-title mb-0">Edit Profile</h3>
          </div>
         
          <div class="card-body">
            <div class="col-12">
                <x-form method="put" action="{{ route('profile.update' ) }}">
                    @bind($user)
                        <x-form-input name="name" label="Никнейм" type="text" />
                        <x-form-input name="email" label="Электронная почта" type="email" />
                        <x-form-input name="avatar_url" label="Аватарка" type="url" />
    
                    <div class="pt-3">
                        <x-form method="put" action="{{ route('profile.destroy') }}">
                            <button class="btn btn-dark">Изменить</button>
                        </x-form>
                    </div>
                    @endbind
                </x-form>
            </div>
            <hr>
            <h4>Сменить пароль:</h4>
            <div class="pt-2">
                <x-form method="put" action="{{ route('password.update') }}">
                    @csrf
                    <div class="mb-3">
                        <x-form-input name="current" label="{{ Str::title(trans('validation.attributes.current_password')) }}" type="password"></x-form-input>
                    </div>
                    <div class="mb-3">
                        <x-form-input name="password" label="{{ Str::title(trans('validation.attributes.new_password')) }}" type="password"></x-form-input>
                    </div>
                    <div class="mb-3">
                        <x-form-input name="password_confirmation" label="{{ Str::title(trans('validation.attributes.password_confirmation')) }}" type="password"></x-form-input> 
                    </div>
                    {{-- <div class="mb-3">
                        <x-recaptcha name="g-recaptcha-response" > </x-recaptcha>
                    </div> --}}
                    <div>
                        <button type="submit" class="btn btn-primary">{{ Str::title(trans('custom.btn_change_password')) }}</button>
                    </div>
                </x-form>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection