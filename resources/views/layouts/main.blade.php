<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-dark bg-dark">
                123
            </nav>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col col-12 col-md-3">
                        <ul class="nav flex-column nav-pills">
                            123
                        </ul>
    
                    </div>
                    <div class="col col-12 col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer text-center text-lg-start">
            <!-- Grid container -->
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
            <!-- Grid container -->
          
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <span id="currentYearId">2023</span>
              <a class="text-light" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>

</body>
</html>