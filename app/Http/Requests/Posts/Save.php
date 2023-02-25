<?php

namespace App\Http\Requests\Posts;

use App\Rules\BirthYearRule;
use App\Rules\AllInModel;
use App\Models\Tag;
use App\Rules\CleanHtml;
use App\Rules\ContentTagsOnly;
use Illuminate\Foundation\Http\FormRequest;

class Save extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:3|max:128',
            'content' => ['required'],
            // 'content' => ['required', new CleanHtml],
            // 'content' => ['required', new ContentTagsOnly],
            'category_id' => 'required|numeric',
            'tags' => ['required', 'array', new AllInModel(Tag::class)],
            // 'tags' => 'required|array',
            // 'tags' => 'required|exists:tags,id',
            'birth_year' => [
                'required',
                new BirthYearRule()
            ]
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок',
            'content' => 'Текст поста'
        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Слишком коротко! 3 давай',
            'tags.exists' => 'Ошибка добавления тегов. Перезагрузите страницу'
        ];
    }
}
