<x-layouts.main 
    title="Create category"
> 
<a href="{{ route('categories.index') }}">CATS</a>
<h1>POSTS</h1>
<a href="{{ route('posts.create') }}">Create post</a>
@foreach ($posts as $post)
    <h1>{{ $post->title }}</h1>
    <h1>{{ $post->content }}</h1>
    <a href="{{ route('posts.show',$post->id) }}">go into</a>
    <hr>
@endforeach
<button  class="btn btn-primary testbtn">Send</button>
</x-layouts.main>