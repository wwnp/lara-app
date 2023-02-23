<?php

namespace App\Http\Requests\Tags;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // + ignore on edit
        return [
            'url' => ['required', 'min:4', 'max:64', $this->makeUniqueRule()],
            'title' => ['required', 'min:4', 'max:64', $this->makeUniqueRule()],
        ];
    }

    public function attributes()
    {
        return [
            'url' => 'Url тега',
            'title' => 'Название тега',
        ];
    }

    public function makeUniqueRule()
    {
        return Rule::unique('tags');
    }
}
