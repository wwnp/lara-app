@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-12 col-lg-2 bg-dark-custom p-1 custom-border-bottom">
                <ul class="nav flex-column nav-pills">

                    @auth
                        <x-navigation.link routeName="comments.index">Comments</x-navigation.link>
                        <x-navigation.link routeName="posts.index">Posts</x-navigation.link>
                        <x-navigation.link routeName="comments.new">New comments</x-navigation.link>
                    @else
                        <a href="{{ route('login')}}" class="btn btn-success">Login</a>
                    @endif

                </ul>
            </div>
            <div class="col col-12 col-lg-10 p-0">
                <x-notification />
                @yield('content')
            </div>
        </div>
    </div>
@endsection