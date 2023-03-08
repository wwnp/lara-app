<?php

namespace App\Http\Controllers;

use Dadata\DadataClient;
use Illuminate\Http\Request;

class Address extends Controller
{
    public function form()
    {
        return view('address.form');
    }
    public function parse(Request $request, DadataClient $dadata)
    {
        dd($dadata);
        return view('address.result');
    }
}
