@section('main')
    <main>
        <div class="container-fluid h-100percent">
            <div class="row h-100percent">
                <div class="col col-12 col-lg-2 bg-dark-custom p-1 custom-border-bottom">
                    <div class="container">
                        <div class="py-2">
                            <h3 class="h3 text-white">{{ trans('messages.navigation') }}:</h3>
                            <hr>
                            <ul class="nav flex-column nav-pills">
                                <x-navigation.link routeName="posts.index">{{ trans("messages.articles") }}</x-navigation.link>
                                <x-navigation.link routeName="category.slug" id="php">{{ trans("messages.php") }}</x-navigation.link>
                                <x-navigation.link routeName="category.slug" id="javascript">{{ trans("messages.js") }}</x-navigation.link>
                            </ul>
                        </div>
                        <div class="py-2">
                            <h3 class="h3 text-white">{{ trans('messages.best') }}:</h3>
                            <hr>
                            <ul class="nav flex-column nav-pills">
                                @foreach ($best as $item)
                                    <x-navigation.link routeName="posts.show" id="{{ $item['id'] }}">{{ $item['routeName'] }}</x-navigation.link>
                                @endforeach
                            </ul>
                        </div>
                        <hr/>
                        <div class="py-2">
                            <h3 class="h3 text-white">{{ trans('messages.new') }}:</h3>
                            <ul class="nav flex-column nav-pills">
                                @foreach ($new as $item)
                                    <x-navigation.link routeName="posts.show" id="{{ $item['id'] }}">{{ $item['routeName'] }}</x-navigation.link>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col col-12 col-lg-10 p-0">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

@endsection