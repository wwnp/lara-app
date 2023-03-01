<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordEqualUserPasswordRule implements Rule
{

    public function __construct()
    {
    }

    public function passes($attribute, $value)
    {
        return boolval(password_verify($value, Auth::user()->password));
    }

    public function message()
    {
        return trans('custom.passwords_mismatched');
    }
}
