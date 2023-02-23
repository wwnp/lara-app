<?php

namespace App\Http\Requests\Comments;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $post_id = $this->input('id');
        return [
            'nickname' => 'required|min:1|max:25',
            'body' => 'required|min:1',
            'id' => 'required|numeric',
            'for' => "required|in:post,video",
            'g-recaptcha-response' => 'required',
            'comments_limit' => Rule::requiredIf(function () use ($post_id) {
                return Post::findOrFail($post_id)->comments()->count() >= 5;
            }),
        ];
    }

    public function messages()
    {
        return [
            'comments_limit.required' => 'Reached the maximum number of comments for this post.',
        ];
    }
}
