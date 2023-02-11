<?php

namespace App\Http\Controllers;

use App\Models\Post as PostModel;
use App\Models\Category as CategoryModel;
use App\Models\Comment;
use Illuminate\Http\Request;

class Posts extends Controller
{
    public function index()
    {
        $posts = PostModel::with("category")->get();
        return view("posts.index", [
            "posts" => PostModel::all(),
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
        PostModel::create($data);
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $comments = Comment::where("post_id", $id)->where("moderated", "!=", 0)->get();
        $post = PostModel::findOrFail($id);
        return view("posts.show", compact('post', 'comments'));
    }

    public function edit($id)
    {
        $cats = CategoryModel::pluck("title", "id"); // value - key
        $post = PostModel::findOrFail($id);
        return view("posts.edit", compact('post', 'cats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $post = PostModel::findOrFail($id);
        $data = $request->only(["title", "content"]);
        $post->update($data);
        return redirect()->route('posts.index');
    }
    public function destroy($id)
    {
        $post = PostModel::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
// | create, update, delete  | only all | where | redirect | findOrFail, all |

// docs: router, blade directives, artisan, urm 