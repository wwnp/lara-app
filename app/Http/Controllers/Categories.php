<?php
// 


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as CategoryModel;
use App\Models\Good as GoodModel;

class Categories extends Controller
{
    public function index()
    {
        return "HOME";
    }

    public function show($slug)
    {
        $category = CategoryModel::where('slug', '=', $slug)->firstOrFail();
        // $catData = CategoryModel::where('slug', '=', $slug)->firstOrFail();
        // $goods = GoodModel::where('id_cat', '=', $catData["id"])->get();
        return view('categories.user.slug', compact('category'));
    }
    public function testNewModelMethod()
    {
        $data = CategoryModel::newModelMethod()->get();
        dd($data);
    }
}

// findOrFail($id) // find record by id
// firstOrFail()  // first record or error ; use it with where('slug', '=', $slug)
// get() // get collection of model
// pluck() // get values collection
  
// toArray()