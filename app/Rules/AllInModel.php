<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AllInModel implements Rule
{
    protected string $model;
    public function __construct($modelClass)
    {
        $this->model = $modelClass;
    }

    public function passes($attribute, $value)
    {
        $count = $this->model::whereIn("id", $value)->count();

        foreach ($value as $id) {

            if (!preg_match('/^[1-9]+\d*$/', $id)) {
                dd($id);
                // if (!preg_match('/^[1-9]+\d*$/', $id)) {
                return false;
            }
        }


        return $count === count($value);
    }

    public function message()
    {
        return 'The validation error message. BAD INJECTION';
        // return trans('validation.allinmodel');
    }
}
