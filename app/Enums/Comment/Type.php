<?php

namespace App\Enums\Comment;

use App\Models\Post;
use App\Models\Video;

enum Type
{
    case post = Post::class;
    case video = Video::class;
}

/*
    
return match($this->value){
            0 => 'Черновик',
            5 => 'Одобрен',
            10 => 'Отклонён'
        };
*/