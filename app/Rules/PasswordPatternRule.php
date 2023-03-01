<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordPatternRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^(?=.*[a-zA-Z])(?=.*\d).+$/', $value) === 1;
    }

    public function message()
    {
        return trans('validation.password.letters');
    }
}


// $2y$10$mCWl9DJDGT2v8TDIjqNtqO8Mw28.CrUwcN6Fq8LtKqv3jszHp1pGu