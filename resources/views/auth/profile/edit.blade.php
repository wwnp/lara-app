@extends('layouts.global')
@extends('layouts.another')
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-10 col-md-8"  style="z-index:1; position:relative">
        <div class="card shadow-lg">
          <div class="card-header">
            <h3 class="card-title mb-0">Edit Profile</h3>
          </div>
          <div class="card-body">
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

        </div>
      </div>
    </div>
  </div>
@endsection