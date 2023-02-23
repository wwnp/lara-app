@section('main')
    <div class="container pt-4">
        <div class="row">
            <div class="col col-12 col-md-3">
                <ul class="nav flex-column nav-pills">
                    <x-navigation.link routeName="comments.index">Comments</x-navigation.link>
                    <x-navigation.link routeName="posts.index">Posts</x-navigation.link>
                    <x-navigation.link routeName="comments.new">New comments</x-navigation.link>
                </ul>

            </div>
            <div class="col col-12 col-md-9">
                <x-notification />
                @yield('content')
            </div>
        </div>
    </div>
@endsection