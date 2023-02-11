<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class Comments extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'author' => 'required',
            'content' => 'required',
        ]);
        $request->request->add(['post_id' => $id]);
        $data = $request->only(['author', 'content', "post_id"]);
        Comment::create($data);
        return redirect()->route('posts.show', ['id' => $id]);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
