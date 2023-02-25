<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Enums\Comment\Status as CommentStatus;

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
}
