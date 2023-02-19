<?php

namespace App\Enums\Comment;

enum Status: int
{
    case MODERATION = 0;
    case APPROVED = 1;
    case REJECTED = 2;
    public function text()
    {
        return match ($this->value) {
            self::MODERATION->value => 'На модерации',
            self::APPROVED->value => 'Одобрен',
            self::REJECTED->value => 'Отклонён'
        };
    }
}

/*
    
return match($this->value){
            0 => 'Черновик',
            5 => 'Одобрен',
            10 => 'Отклонён'
        };
*/