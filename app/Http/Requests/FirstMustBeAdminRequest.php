<?php

namespace App\Http\Requests;

use App\Rules\RoleAdminInArrayRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FirstMustBeAdminRequest extends FormRequest
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
        $inputData = $this->all();
        $roles = $inputData["roles"];
        // dd($roles);
        // $id = $this->input('user_id');
        // dd($id);
        return [
            'user_id' => [new RoleAdminInArrayRule($roles)],
        ];
    }
}
