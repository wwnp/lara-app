<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Requests\Posts\Store as StoreRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Posts extends Controller
{
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
        // dd($data);
        $postdata = $request->safe()->only(['title', 'content', 'category_id']);
        $post = Post::create($postdata);
        $post->tags()->sync($data['tags']);
        return redirect()->route('posts.show', [$post->id]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = $post->tags()->pluck("title", "id");
        // dd($tags);
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

    // public function updateRequest(Request $request)
    // {
    //     $data = $request->all();
    //     dd($data);
    //     // Add or update data in $request here
    //     $request->merge(['new_data' => 'some value']);
    //     return response()->json(['message' => 'Request updated successfully!']);
    // }
}
