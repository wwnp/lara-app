<?php

namespace App\Http\Requests\Categories;

use Illuminate\Validation\Rule;

class Update extends Store
{

    public function rules()
    {
        return [
            'slug' => 'required',
            // 'slug' => ['required', Rule::unique("categories")->ignore(request()->id)],
            'title' => ['required'],
            'desc' => 'required',
        ];
    }
}
