<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use App\Rules\PasswordPatternRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:25',
            'email' => ['required', 'email', Rule::unique(User::class)],
            'password' => ['required', 'min:3', new PasswordPatternRule],
            'password_confirmation' => ['required', 'same:password'],
            // 'g-recaptcha-response' => 'required',
        ];
    }
}
//    ^(?=.*[a-zA-Z])(?=.*\d).+$