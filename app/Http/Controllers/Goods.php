<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good as GoodModel;
use App\Models\Category as CategoryModel;

class Goods extends Controller
{
    public function index()
    {
        $goods = GoodModel::all(["id", "name", "desc"]);
        return view("goods.index", compact("goods"));
    }
    public function create()
    {
        $cats = CategoryModel::all(["id", "title"]);
        return view("goods.create", compact("cats"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|min:3",
            'desc' => "required",
        ]);
        $data = $request->only("name", "desc", "id_cat");
        GoodModel::create($data);
        return redirect()->route("goods.index");
    }
    public function show($id)
    {
        $good = GoodModel::findOrFail($id);
        return view("goods.show", compact("good"));
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
