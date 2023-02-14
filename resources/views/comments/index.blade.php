{{-- @php
    dd($comments);
@endphp --}}
<x-layouts.main 
    title="INDEX COMMENTS"
> 
@bind($comments)
@include('comments.table')
@endbind
{{-- @foreach ($comments as $comment)
    {{ $comment->author }}
    {{ $comment->content }}
    <p>POST TITLE:    {{ $comment->post->title }}</p>
    <p>CATEGORY TITLE:    {{ $comment->post->category->title }}</p>
@endforeach --}}
</x-layouts.main>