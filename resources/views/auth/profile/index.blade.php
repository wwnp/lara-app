@extends('layouts.global')
@extends('layouts.another')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4" style="z-index:1; position:relative">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <div class="avatar border rounded-circle overflow-hidden mr-3">
                            <img src="{{ $user->avatar_url }}" alt="Avatar Image" class="w-100">
                        </div>
                       
                    </div>
                    <h4 class="mb-0 text-center">{{ ucfirst($user->name) }}</h4>
                    <div class="my-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus tempora, quis a eaque quae nobis natus inventore corrupti veritatis. Consectetur, ipsa quos consequuntur sunt et tenetur aspernatur recusandae voluptatibus pariatur!</div>
                    <div class="card-text">
                        <x-form method="delete" action="{{ route('profile.destroy') }}">
                            <button class="btn btn-danger">Выйти</button>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-4" style="z-index:1; position:relative">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded-circle mr-3">
                          <img src="{{ $user->avatar_url }}" alt="Avatar Image" class="rounded-circle">
                        </div>
                        <h4 class="mb-0">{{ ucfirst($user->name) }}</h4>
                      </div>
                      
                    <div class="card-text">
                        <x-form method="delete" action="{{ route('profile.destroy') }}">
                            <button class="btn btn-danger">Выйти</button>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection