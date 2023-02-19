<?php

namespace App\Http\Requests\Posts;

use App\Enums\Comment\Type as CommentType;
use Illuminate\Foundation\Http\FormRequest;

class Comment extends FormRequest
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
            'nickname' => 'required|min:1|max:25',
            'body' => 'required|min:1',
            'id' => 'required|numeric',
            'for' => "required|in:post,video",
        ];
    }
}
