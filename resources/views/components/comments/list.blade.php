@props(['comments'])
@foreach($comments as $comment)
    <div class="alert alert-success">
        <em>{{ $comment->created_at }}</em>
        <h5>{{ $comment->nickname }}</h5>
        <div class="mt-2">{{ $comment->body }}</div>
        <a href="{{ route('comments.edit', [ $comment->id ]) }}">Edit</a>
    </div>
@endforeach