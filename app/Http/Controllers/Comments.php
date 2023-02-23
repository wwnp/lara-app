<?php

namespace App\Http\Controllers;

use App\Enums\Comment\Status as CommentStatus;
use App\Enums\Comment\Types as CommentTypes;
use App\Http\Requests\Comments\Update as UpdateRequest;
use App\Http\Requests\Comments\Store as StoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class Comments extends Controller
{
    const FOR_ROUTES = [
        'post' => "posts.show",
        'video' => "videos.show",
    ];

    public function index()
    {
        $comments = Comment::with('commentable')->withTrashed()->get();
        return view('comments.index', [
            'comments' => $comments,
        ]);
    }

    public function create()
    {
        abort(404);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $modelName = CommentTypes::fromName($request->safe()->for)->value;

        $essence = $modelName::findOrFail($data['id']);

        if ($essence->comments()->count() >= 5) {
            return redirect()
                ->back()
                ->withErrors(['comments_limit' => 'Reached the maximum number of comments for this post.']);
        }

        $data = $request->safe()->only(['nickname', 'body']);

        $model = $modelName::findOrFail($request->safe()->id);
        $model->comments()->create($data);
        session()->flash('notification', 'comments.create');
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
        session()->flash('notification', 'comments.updated');
        $route = self::FOR_ROUTES[CommentTypes::from($modelName)->name]; // posts.show = FOR_ROUTES['post']
        return redirect()->route($route, [$post->id]);
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
    public function test(Request $request)
    {
        dd($request->param);
    }
}
