<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Enums\Comment\Status as CommentStatus;
use App\Http\Requests\Comments\Store as StoreRequest;
use App\Enums\Comment\Types as CommentTypes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Comments extends Controller
{
    public function index()
    {
        $comments = Comment::with('commentable')->withTrashed()->get();
        return view('comments.index', [
            'comments' => $comments,
        ]);
    }

    // public function edit($id)
    // {
    //     $comment = Comment::with("commentable")->find($id);
    //     return view('comments.edit', ['comment' => $comment]);
    // }

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

    public function store(StoreRequest $request)
    {

        $data = $request->validated();
        $user = Auth::user();

        $modelName = CommentTypes::fromName($request->safe()->for)->value;

        $essence = $modelName::findOrFail($data['id']);

        if ($essence->comments()->count() >= 5) {
            return redirect()
                ->back()
                ->withErrors(['comments_limit' => 'Reached the maximum number of comments for this post.']);
        }
        $data = $request->safe()->only(['nickname', 'body']);
        if (isset($user) &&  $user->roles()->whereIn('role', ['admin', 'moderator'])->count() > 0) {
            $data += ["status" => CommentStatus::APPROVED];
        }


        $model = $modelName::findOrFail($request->safe()->id);
        $model->comments()->create($data);
        session()->flash('notification', 'comments.create');
        return redirect()->back();
    }
}
