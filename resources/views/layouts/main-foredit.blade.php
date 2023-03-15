@section('main')
    {{-- <main>
        <div class="container h-100percent  px-5">
            <div class="row h-100percent  px-5">
                <x-notification />
                @yield('content')
            </div>
        </div>
    </main> --}}
    <main>
        <div class="container py-3">
            @yield('content')
        </div>
    </main>


@endsection