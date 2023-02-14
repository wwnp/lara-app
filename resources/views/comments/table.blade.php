{{-- 
@php
    foreach($comments as $comment) {
        dd($comment->commentable->id);
    }
@endphp --}}

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">AUTHOR</th>
        <th scope="col">CONTENT</th>
        <th scope="col">MODERATED</th>
        <th scope="col">DELETED_AT</th>
        <th scope="col">POST LINK</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->nickname }}</td>
                <td>{{ $comment->body }}</td>
                <td>{{ $comment->moderated }}</td>
                <td>{{ $comment->deleted_at ?? "not deleted" }}</td>
                <td><a href="{{ route("posts.show", [$comment->commentable->id]) }}">{{ $comment->commentable->title }}</a></td>

                @if ($comment->deleted_at === null)
                    <td>
                        <x-button
                            class="danger"
                            method="{{App\Enums\ButtonTypes::delete}}"
                            label="Delete"
                            routeName="comments.destroy"
                            id="{{ $comment->id }}"
                        >
                        </x-button>
                    </td>
                @else
                    <td>
                        <x-button
                            class="info"
                            method="{{App\Enums\ButtonTypes::put}}"
                            label="Restore"
                            routeName="comments.restore"
                            id="{{ $comment->id }}"
                        >
                        </x-button>
                    </td>
                @endif

                @if ($comment->moderated == App\Enums\Status::new->value && $comment->deleted_at === null) {
                    <td>
                        <x-button
                            class="success"
                            method="{{App\Enums\ButtonTypes::put}}"
                            label="Approve"
                            routeName="comments.approve"
                            id="{{ $comment->id }}"
                        >
                        </x-button>
                    </td>
                    <td>                        
                        <x-button
                            class="warning"
                            method="{{App\Enums\ButtonTypes::put}}"
                            label="Decline"
                            routeName="comments.decline"
                            id="{{ $comment->id }}"
                        >
                        </x-button>
                    </td>
                }
                @else
                    <td>
                        <x-button
                            class="success disabled"
                            method="{{App\Enums\ButtonTypes::put}}"
                            label="Approve"
                            routeName="comments.approve"
                            id="{{ $comment->id }}"
                        >
                        </x-button>
                    </td>
                    <td>                        
                        <x-button
                            class="warning disabled"
                            method="{{App\Enums\ButtonTypes::put}}"
                            label="Decline"
                            routeName="comments.decline"
                            id="{{ $comment->id }}"
                        >
                        </x-button>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
  </table>