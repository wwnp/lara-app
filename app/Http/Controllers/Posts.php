<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Post;
use App\Models\Category as CategoryModel;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Posts extends Controller
{
    public function index()
    {
        return view("posts.index", [
            "posts" => Post::with(['category'])->get(),
        ]);
    }
    public function create()
    {
        $cats = CategoryModel::pluck("title", "id");
        return view("posts.create", compact("cats"));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:1|max:128',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $data = $request->only(["title", "content", "category_id"]);
        Post::create($data);
        return redirect()->route('posts.index');
    }
    public function show($id)
    {
        $post = Post::find($id);
        // $comment = Comment::find(1);
        // dd($comment->commentable);
        // $post = Post::findOrFail($id);
        // dd($post->comments);
        // $comments = $post->comments()->where("moderated", Status::approved->value)->orderByDesc("created_at")->get(); // ->comments() from PostModel
        return view("posts.show", compact('post'));
    }
    public function edit($id)
    {
        $cats = CategoryModel::pluck("title", "id"); // value - key
        $post = Post::findOrFail($id);
        return view("posts.edit", compact('post', 'cats'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);
        $post = Post::findOrFail($id);
        $data = $request->only(["title", "content"]);
        $post->update($data);
        return redirect()->route('posts.index');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
// | create, update, delete  | only all | where | redirect | findOrFail, all |

// docs: router, blade directives, artisan, urm 