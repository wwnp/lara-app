<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsAdmin extends Controller
{
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
        //
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nickname' => 'required',
            'body' => 'required',
            'id' => 'required|numeric',
        ]);
        $data = $request->only(['nickname', 'body']);
        $post = Post::findOrFail($request->id);
        $post->comments()->create($data);
        return redirect()->route('posts.show', ['id' => $id]);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('comments.index');
    }

    public function new()
    {
        return view('comments.new', [
            'comments' => Comment::with(['post.category'])->get()
        ]);
    }

    public function restore($id)
    {
        Comment::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('comments.index');
    }

    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(["moderated" => Status::approved]);
        return redirect()->route('comments.index');
    }

    public function decline($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(["moderated" => Status::declined]);
        return redirect()->route('comments.index');
    }
}

        // $posts = Post::all();
        // foreach ($posts as $post) {
        //     echo '<pre style="border: 1px solid #000; height: auto; overflow: auto; margin: 0.5em;">';
        //     echo "  <hr />";
        //     print_r($post->comments->toArray());
        //     echo '</pre>';
        //     echo '<hr>';
        // }