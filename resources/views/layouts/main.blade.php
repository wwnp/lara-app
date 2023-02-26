@section('main')
    <main>
        <div class="container-fluid h-100percent">
            <div class="row h-100percent">
                <div class="col col-12 col-lg-2 bg-dark-custom p-1 custom-border-bottom">
                    <h6 class="display-6 text-white">Interesting:</h6>
                    <hr>
                    <ul class="nav flex-column nav-pills">
                        {{-- <x-navigation.link routeName="posts.slug">What is about ChatGPT</x-navigation.link> --}}
                        <x-navigation.link routeName="posts.slug" id="php">About PHP</x-navigation.link>
                        <x-navigation.link routeName="posts.slug" id="javascript">About JS</x-navigation.link>
                    </ul>
                </div>
                <div class="col col-12 col-lg-10 p-0">
                    <x-notification />
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

@endsection