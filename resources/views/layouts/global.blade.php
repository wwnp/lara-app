<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/toastify.min.css') }}"> --}}
    {{-- <script src="{{ asset('js/toastify.min.js') }}"></script> --}}
</head>
<body>
    <x-notification />
    <div class="app-grid">
        <header class="border-bottom">
            <div class="container-fluid">
                <nav class="navbar navbar-dark bg-light ">
                    <div>
                        <x-nav-header></x-nav-header>
                        {{-- <h2>{{ Route::currentRouteName() }}</h2> --}}
                        
                        {{-- <h5>{{ Auth::user() }}</h5> --}}
    
                        {{-- @foreach (Auth::user()->roles()->get() as $role)
                            <h5>{{ $role->role }}</h5>
                        @endforeach --}}
    
                        @if (Auth::check() && !Auth::user()->hasVerifiedEmail())
                            <div>
                                Please <a href="{{ route('verification.notice') }}">verify your email address</a>.
                            </div>
                        @endif
    
    
                    </div>
                </nav>
            </div>
        </header>

        @yield('main')
    
        <footer class="footer text-center text-lg-start bg-dark-custom text-white">
            <div class="container p-4">
                <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#!" class="text-light">Link 1</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Link 2</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Link 3</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Link 4</a>
                    </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Links</h5>
                    <ul class="list-unstyled">
                    <li>
                        <a href="#!" class="text-light">Link 1</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Link 2</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Link 3</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Link 4</a>
                    </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>
            
                    <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#!" class="text-light">Link 1</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Link 2</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Link 3</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Link 4</a>
                    </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Links</h5>
            
                    <ul class="list-unstyled">
                    <li>
                        <a href="#!" class="text-light">Link 1</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Link 2</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Link 3</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Link 4</a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <span id="currentYearId">2023</span>
                <a class="text-light" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
        </footer>
        <div id="loading">
            <div class="spinner"></div>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
</body>
</html>