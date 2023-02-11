<x-layouts.main 
    title="Create category"
> 
<h2>{{ $post->title }}</h2>
<h2>{{ $post->content }}</h2>
<a href="{{ route('posts.index') }}">POSTS</a>
<a href="{{ route('posts.edit', $post->id) }}">EDIT ART</a>
<form method="post" action="{{ route('posts.destroy', [ $post->id ]) }}">
    @csrf
    @method('DELETE')
    <button>Delete</button>
</form>
<hr />
<h3>Comments:</h3>
<x-form method="post" action="{{ route('comments.store', $post->id)   }}">
    <x-form-input name="author" label="Author" />
    <x-form-textarea name="content" label="Content" />
    <button class="btn btn-success mt-3">Send</button>
</x-form>

<div class="container">
    <div class="row">
        <div class="col-12">
            @foreach ($comments as $comment)
                <p>{{ $comment->author }} said:</p>
                <p>{{ $comment->content }}</p>
                <hr>
            @endforeach

        </div>
    </div>
</div>

</x-layouts.main>