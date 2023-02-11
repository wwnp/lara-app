<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as CategoryModel;

class CategoriesAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryModel::all();
        return view('categories.admin.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = [];
        return view('categories.admin.create', compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|min:1|max:128|unique:categories',
            'title' => 'required|min:3|max:15',
            'desc' => 'required',
        ]);
        // $data = $request->only(['slug', 'title', 'desc']);
        // CategoryModel::create($data);
        // return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = CategoryModel::findOrFail($id);
        return view('categories.admin.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $category = CategoryModel::findOrFail($id);
        return view('categories.admin.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'slug' => "required|min:1|max:128|unique:categories,slug,$id"
        ]);

        $category = CategoryModel::findOrFail($id);
        $data = $request->only(['slug', 'title', 'description']);
        $category->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CategoryModel::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index');
    }

    public function trash(Request $request)
    {
        $trash = CategoryModel::onlyTrashed()->get();
        return view('categories.admin.trash', compact('trash'));
    }

    public function restore($id)
    {
        $cat = CategoryModel::onlyTrashed()->findOrFail($id);
        $cat->restore();
        return redirect()->route('categories.admin.index');
    }
    public function permadestroy($id)
    {
        CategoryModel::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('categories.admin.index');
    }
}
