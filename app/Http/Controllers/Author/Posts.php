<?php

namespace App\Http\Controllers\Author;

use App\Models\Post;
use App\Http\Requests\Posts\Store as StoreRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Enums\Comment\Status as CommentStatus;

class Posts extends Controller
{
    public function index()
    {
        return view('posts.index', [
            "posts" =>  Post::with("category")->withCount("comments")->orderBy("id", "DESC")->paginate(5)->onEachSide(2),
            "tags" => Tag::pluck("title", "id")
        ]);
    }

    public function create()
    {
        $cats = Category::pluck("title", "id");
        $tags = Tag::pluck("title", "id"); // for x-form-select
        $postTags = [];
        return view("posts.create", compact("cats", "tags", "postTags"));
    }

    public function store(StoreRequest $request)
    {

        $data = $request->validated();
        $postdata = $request->safe()->only(['title', 'content', 'category_id']);
        $post = Post::create($postdata);
        $post->tags()->sync($data['tags']);
        return redirect()->route('posts.show', [$post->id]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = $post->tags()->pluck("title", "id");
        $cats = Category::pluck("title", "id");
        return view('posts.edit', compact('post', 'cats', 'tags'));
    }

    public function update(StoreRequest $request, $id)
    {

        $data = $request->validated();
        $post = Post::findOrFail($id);
        $postdata = $request->safe()->only(['title', 'content', 'category_id']);
        $post->tags()->sync($data['tags']);
        $post->update($postdata);
        return redirect()->route('posts.show', [$post->id]);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
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
