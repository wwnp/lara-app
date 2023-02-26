
<table class="table table-sm table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">AUTHOR</th>
        <th scope="col">CONTENT</th>
        <th scope="col">STATUS</th>
        <th scope="col">DELETED_AT</th>
        <th scope="col">POST LINK</th>
        <th scope="col">DEL/RES</th>
        <th scope="col">APPROVE</th>
        <th scope="col">DECLINE</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->nickname }}</td>
                <td>{{ $comment->body }}</td>
                <td>{{ $comment->status }}</td>
                <td>{{ $comment->deleted_at ?? "not deleted" }}</td>
                <td><a href="{{ route("posts.show", [$comment->commentable->id]) }}">{{ $comment->commentable->title }}</a></td>

                <td>
                    <x-button
                        id="{{ $comment->id }}"
                        type="{{ 
                        $comment->deleted_at === null 
                        ? App\Enums\ButtonTypes::DELETE 
                        : App\Enums\ButtonTypes::RESTORE 
                        }}"
                    >
                    </x-button>
                </td>

                <td>
                    <x-button
                        id="{{ $comment->id }}"
                        type="{{ App\Enums\ButtonTypes::APPROVE }}"
                        disabled="{{ 
                        $comment->status == App\Enums\Comment\Status::APPROVED->value
                        || 
                        $comment->deleted_at !== null 
                        }}"
                    >
                    </x-button>
                </td>
                <td>
                    <x-button
                        id="{{ $comment->id }}"
                        type="{{ App\Enums\ButtonTypes::DECLINE }}"
                        disabled="{{ 
                        $comment->status == App\Enums\Comment\Status::REJECTED->value
                        || 
                        $comment->deleted_at !== null 
                        }}"
                    >
                    </x-button>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>