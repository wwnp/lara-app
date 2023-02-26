<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body class="app-grid ">
    <header>
        <nav class="navbar navbar-dark bg-light ">
            <div>
                <x-nav-header></x-nav-header>
                {{-- @auth
                    <a href="{{ route('auth.profile')}}" class="btn btn-warning">Profile</a>
                @else
                    <a href="{{ route('login.create')}}" class="btn btn-success">Login</a>
                @endif --}}
                {{-- <a href="{{ route('posts.index')}}" class="btn btn-info">Posts</a> --}}
            </div>
        </nav>
    </header>

    @yield('main')

    <footer class="footer text-center text-lg-start bg-dark-custom text-white">
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
            <!--Grid column-->
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
            <!--Grid column-->
        
            <!--Grid column-->
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
            <!--Grid column-->
        
            <!--Grid column-->
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
            <!--Grid column-->
        
            <!--Grid column-->
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
            <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <span id="currentYearId">2023</span>
            <a class="text-light" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
    </footer>
    <div id="loading">
        <div class="spinner"></div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>