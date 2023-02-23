<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class Videos extends Controller
{
    public function index()
    {
        return view('videos.index', ['videos' => Video::all()]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('videos.show', ['video' => Video::findOrFail($id)]);
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
