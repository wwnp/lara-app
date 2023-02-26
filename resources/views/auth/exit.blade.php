@extends('layouts.global')
@extends('layouts.another')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4" style="z-index:1; position:relative">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <x-form method="delete" action="{{ route('login.destroy') }}">
                            <button class="btn btn-danger">Выйти</button>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection