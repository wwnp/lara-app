<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'slug' => 'required|unique:categories',
            'title' => 'required|unique:categories',
            'desc' => 'required',
        ];
    }
}
