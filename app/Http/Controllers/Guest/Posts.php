<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Enums\Comment\Status as CommentStatus;
use App\Models\Category;

class Posts extends Controller
{
    public function index()
    {
        return view('posts.index', [
            "posts" =>  Post::with("category")->withCount("comments")->orderBy("id", "DESC")->paginate(5)->onEachSide(2),
            "tags" => Tag::pluck("title", "id")
        ]);
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $tags = $post->tags()->get();
        $comments = $post->comments()->rootComments()->where("status", CommentStatus::APPROVED)->get();
        return view('posts.show', compact('post', "comments", "tags"));
    }
    public function slug($slug)
    {
        $category = Category::where("slug", $slug)->first();
        $posts = $category->posts()->paginate(5)->onEachSide(2);
        return view('posts.slug', compact("posts"));
    }
}
