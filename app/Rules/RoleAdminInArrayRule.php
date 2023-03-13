<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RoleAdminInArrayRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public array $roles;
    public function __construct(array $roles)
    {
        $this->roles = $roles;
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
        dd($this->roles);
        return intval($value) === 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
