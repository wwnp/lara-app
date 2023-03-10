<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\Store as StoreRequest;
use App\Http\Requests\Categories\Update as UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class Categories extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view("categories.create");
    }

    public function store(StoreRequest $request)
    {
        dd($request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view("categories.edit", compact("category"));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        Category::findOrFail($id)->update($data);
        return redirect()->route('categories.edit', [$id]);
    }

    public function destroy($id)
    {
        //
    }

    public function new()
    {
        //
    }
}
