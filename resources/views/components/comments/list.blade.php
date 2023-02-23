@props(['comments'])
<style>
    .comment {
        position: relative;
        padding-left: 20px;
    }
    
    .comment::before {
        content: "";
        position: absolute;
        left: 0;
        top: 10px;
        bottom: 0;
        width: 2px;
        background-color: #ccc;
    }
    
    .child-comments {
        margin-left: 20px;
    }
</style>

@if (count($comments) > 0)
    <ul class="root-comments">
        @foreach ($comments as $comment)
            <li>
                @include('components.comments.comment', ['comment' => $comment])
                
                @if ($comment->children)
                    @include('components.comments.child_comments', ['comments' => $comment->children])
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No comments yet.</p>
@endif