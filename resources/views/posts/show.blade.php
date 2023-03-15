@extends('layouts.global')
@extends('layouts.main')
@section('content')
{{-- <script src="{{ asset('js/prism.js') }}"></script> --}}
<article>
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col col-12 col-lg-10 ">
                <header class="mb-4">
                    <h1 class="text-center">{{ $post->title }}</h1>
                    <p class="text-muted text-center">Written by {{$post->user->name}} on {{$post->created_at}}</p>
                        @can('update', $post)
                            <a class="btn btn-sm btn-warning" href="{{ route('posts.edit', ['id' => $post->id]) }}">Редактировать</a>
                            {{-- <h1 class="text-secondary">МОГУ РЕДАКТИРОВАТЬ</h1> --}}
                        @endcan
                  </header>
                  <section>
                      <p>{!! $post->content !!}</p>
                  </section>
                  <footer class="mt-4">
                      @foreach ($tags as $tag)
                          <x-badge >{{$tag->title}}</x-badge>
                      @endforeach
                  </footer>
            </div>
            <div class="col col-12 col-lg-2 ">
                <div class="border p-2 article-side">
                    TAGS
                    AUTHOR
                    DATE
                    RESOURCES  
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto rerum ipsum sunt fugit ut nihil vero ex reprehenderit ad eaque. Tempore vel pariatur commodi veritatis, facilis eum maxime quisquam nemo similique, at incidunt, cupiditate autem unde quis itaque quo maiores dolorem doloribus ab delectus sit adipisci et distinctio quam. Perspiciatis aperiam maxime repellendus aspernatur eligendi. Totam, corporis. Error, cupiditate aliquid. Autem, deserunt, saepe aperiam temporibus iure eum ipsa, ad modi quod nostrum asperiores quo nobis. Provident voluptates officia vero voluptatum nobis id dicta beatae assumenda autem debitis perferendis quam in, consequuntur perspiciatis aut reiciendis animi repellat nemo itaque fugiat sunt.
                </div>
            </div>
        </div>
    </div>
</article>

{{-- <div class="d-flex flex-row">
    <div class="p-2">
        <a class="btn btn-info" href="{{ route('posts.edit', $post->id) }}">Edit article</a>
    </div>
    <div class="p-2">
        <form method="post" action="{{ route('posts.destroy', [ $post->id ]) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
</div> --}}
<hr />

<h5>Comments:</h5>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <x-comments.form for="post" :id="$post->id" />
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <x-comments.list :comments="$comments"></x-comments.list>
        </div>
    </div>
</div>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        Prism.highlightAll();
        console.log(123)
    });
</script> --}}
@endsection

