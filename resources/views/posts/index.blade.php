<h1>POSTS</h1>
<a href="/posts/create">Create post</a>
@foreach ($posts as $post)
    <h1>{{ $post->title }}</h1>
    <h1>{{ $post->content }}</h1>
    <a href="/posts/{{ $post->id }}">go into</a>
    <hr>
@endforeach