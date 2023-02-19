<?php

namespace App\Enums\Comment;

use App\Models\Post;
use App\Models\Video;

enum Types: string
{
    case post = Post::class;
    case video = Video::class;

    public static function fromName(string $name)
    {
        return constant("self::$name");
    }
}
