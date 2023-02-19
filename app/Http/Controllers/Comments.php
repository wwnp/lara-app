<?php

namespace App\Http\Controllers;

use App\Enums\Comment\Status as CommentStatus;
use App\Enums\Comment\Type as CommentType;
use App\Http\Requests\Comments\Update as UpdateRequest;
use App\Http\Requests\Comments\Store as StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\Comment as CommentRequest;

class Comments extends Controller
{
    const FOR_MODELS = [
        'post' => Post::class,
        'video' => Video::class
    ];

    public function index()
    {
        $comments = Comment::with('commentable')->withTrashed()->get();
        return view('comments.index', [
            'comments' => $comments,
        ]);
        // $comments = Comment::withTrashed()->with(['post.category'])->get();
    }

    public function create()
    {
        abort(404);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data = $request->safe()->only(['nickname', 'body']);

        $modelName = self::FOR_MODELS[$request->safe()->for];
        $model = $modelName::findOrFail($request->safe()->id);

        $model->comments()->create($data);
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $comment = Comment::with("commentable")->find($id);
        return view('comments.edit', ['comment' => $comment]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $comment =  Comment::findOrFail($id);
        $modelName = $comment->commentable_type; // App\Models\Post
        $post = $modelName::findOrFail($comment->commentable_id); // $post = App\Models\Post::findOrFail( 1 )
        Comment::findOrFail($id)->update($data);
        return redirect()->route('posts.show', [$post->id]);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Comment::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }

    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(["status" => CommentStatus::APPROVED]);
        return redirect()->back();
    }

    public function decline($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(["status" => CommentStatus::REJECTED]);
        return redirect()->back();
    }

    public function new()
    {
        $comments = Comment::with('commentable')->where("status", CommentStatus::MODERATION)->where("deleted_at", "=", null)->get();
        return view('comments.index', [
            'comments' => $comments,
        ]);
    }
}
