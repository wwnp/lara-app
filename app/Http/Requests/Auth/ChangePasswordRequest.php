<?php

namespace App\Http\Requests\Auth;

use App\Rules\PasswordEqualUserPasswordRule;
use App\Rules\PasswordPatternRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class ChangePasswordRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current' => ['required', 'current_password'],
            'password' => ['required', 'confirmed'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],

            // 'current_password' => ['required', new PasswordEqualUserPasswordRule],
            // 'password' => ['required', new PasswordPatternRule],
            // 'password_confirmation' => ['required', 'same:password'],
        ];
    }
}
