<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tags\Save as SaveRequest;
use App\Models\Tag;

class Tags extends Controller
{
    public function index()
    {
        $tag = Tag::findOrFail(1)->posts()->get()->count();
        dd($tag);
        return view('tags.index', ['tags' => Tag::all()]);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(SaveRequest $request)
    {
        $data = $request->validated();
        $tag = Tag::create($data);
        return redirect()->route('tags.index');
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(SaveRequest $request, $id)
    {
        $data = $request->validated();
        $tag = Tag::findOrFail($id);
        $tag->update($data);
        return redirect()->route('tags.show', [$tag->id]);
    }

    public function destroy($id)
    {
        //
    }
}