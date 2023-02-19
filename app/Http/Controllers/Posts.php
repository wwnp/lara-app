<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Enums\Post\Status as PostStatus;
use App\Enums\Comment\Status as CommentStatus;
use App\Http\Requests\Posts\Save as SaveRequest;
use App\Http\Requests\Posts\Comment as CommentRequest;
use App\Models\Category;

class Posts extends Controller
{
    public function index()
    {
        return view('posts.index', [
            "posts" =>  Post::with("category")->get()
        ]);
    }

    public function create()
    {
        $cats = Category::pluck("title", "id");
        return view("posts.create", compact("cats"));
    }

    public function store(SaveRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        return redirect()->route('posts.show', [$post->id]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments()->where("status", CommentStatus::APPROVED)->get();
        return view('posts.show', compact('post', "comments"));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $cats = Category::pluck("title", "id");
        // $post->status = PostStatus::APPROVED;
        // $post->save();
        // $post->options = [
        //     ['title' => 'Weight', 'value' => 100],
        //     ['title' => 'Height', 'value' => 200]
        // ];
        // $post->save();
        return view('posts.edit', compact('post', 'cats'));
    }

    public function update(SaveRequest $request, $id)
    {
        $data = $request->validated();
        $post = Post::findOrFail($id);
        $post->update($data);
        return redirect()->route('posts.show', [$post->id]);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function comment(CommentRequest $request, $id)
    {
        $data = $request->validated();
        $post = Post::findOrFail($request->id);
        $post->comments()->create($data);
        return redirect()->route('posts.show', ['id' => $id]);
    }
}
