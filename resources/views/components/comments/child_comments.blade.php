@if (count($comments) > 0)
    <ul class="child-comments">
        @foreach ($comments as $comment)
            <li>
                @include('components.comments.comment', ['comment' => $comment])
                @if ($comment->children)
                    @include('components.comments.child_comments', ['comments' => $comment->children])
                @endif
            </li>
        @endforeach
    </ul>
@endif