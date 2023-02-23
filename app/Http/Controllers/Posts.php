<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Enums\Comment\Status as CommentStatus;
use App\Http\Requests\Posts\Save as SaveRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

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

    public function store(SaveRequest $request)
    {

        $data = $request->validated();
        // dd($data);
        $postdata = $request->safe()->only(['title', 'content', 'category_id']);
        $post = Post::create($postdata);
        $post->tags()->sync($data['tags']);
        return redirect()->route('posts.show', [$post->id]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $tags = $post->tags()->get();
        $comments = $post->comments()->rootComments()->where("status", CommentStatus::APPROVED)->get();
        return view('posts.show', compact('post', "comments", "tags"));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $cats = Category::pluck("title", "id");
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



    public function updateRequest(Request $request)
    {
        $data = $request->all();
        dd($data);
        // Add or update data in $request here
        $request->merge(['new_data' => 'some value']);
        return response()->json(['message' => 'Request updated successfully!']);
    }
}
