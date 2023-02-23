<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nickname' => 'required|min:1|max:25',
            'body' => 'required|min:1',
            'g-recaptcha' => 'required|captcha'
        ];
    }
}
