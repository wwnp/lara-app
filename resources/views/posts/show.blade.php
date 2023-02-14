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
<h3>CommentsAdmin:</h3>
<x-form method="post" action="{{ route('comments.store', $post->id) }}">
    <input type="text" name="id" value="{{ $post->id }}" hidden>
    <x-form-input name="nickname" label="Nickname" />
    <x-form-textarea name="body" label="Body" />
    <div class="text-end">
        <button class="btn btn-success mt-3">Send</button>
    </div>
</x-form>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            @foreach ($post->comments as $comment)
                <p>{{ $comment->nickname }} said:</p>
                <p>{{ $comment->body }}</p>
                <hr>
            @endforeach
        </div>
    </div>
</div>
</x-layouts.main>