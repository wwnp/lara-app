<?php

namespace App\Http\Controllers;

use App\Models\Post as ModelPost;
use Illuminate\Http\Request;

class Posts extends Controller
{
    public function index()
    {
        return view("posts.index", [
            "posts" => ModelPost::all(),
        ]);
    }
    public function show($id)
    {
        return view("posts.show", [
            "post" => ModelPost::findOrFail($id),
        ]);
    }

    public function edit($id)
    {
        return view("posts.edit", [
            "id" => $id,
            "post" => ModelPost::findOrFail($id),
        ]);
    }

    public function create()
    {
        return view("posts.form", ["title" => "", "content" => ""]);
    }




    public function update(Request $request, $id)
    {
        $data = $request->only(["title", "content"]);
        ModelPost::where('id', $id)->update([
            'title' => $data['title'],
            'content' => $data['content']
        ]);
        return redirect("/posts/{$id}");
    }

    public function store(Request $request)
    {
        $data = $request->only(["title", "content"]);
        ModelPost::create($data);
        // return redirect("/posts");
    }
}
// $args = $request->all();
// $post = new ModelPost();
// $post->title = $args["title"];
// $post->content = $args["content"];
// $post->save();

// $post = new ModelPost();
// $post->title = 'Post';
// $post->content = '2222';
// $post->save();
// ModelPost::create( ["title" => 'title', "content" => 'content'] )