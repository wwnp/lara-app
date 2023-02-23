<?php

namespace App\Http\Requests\Tags;

// use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends Store
{
    public function makeUniqueRule()
    {
        return parent::makeUniqueRule()->ignore($this->route('id'));
    }
}
