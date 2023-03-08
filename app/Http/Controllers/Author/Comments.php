<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\Store as StoreRequest;
use App\Enums\Comment\Types as CommentTypes;

class Comments extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $modelName = CommentTypes::fromName($request->safe()->for)->value;

        $essence = $modelName::findOrFail($data['id']);

        if ($essence->comments()->count() >= 5) {
            return redirect()
                ->back()
                ->withErrors(['comments_limit' => 'Reached the maximum number of comments for this post.']);
        }

        $data = $request->safe()->only(['nickname', 'body']);

        $model = $modelName::findOrFail($request->safe()->id);
        $model->comments()->create($data);
        session()->flash('notification', 'comments.create');
        return redirect()->back();
    }
}
