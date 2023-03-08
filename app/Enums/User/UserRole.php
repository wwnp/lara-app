<?php

namespace App\Enums\User;

enum UserRole: string
{
    case ADMIN = 'admin';
    case AUTHOR = 'author';
    // public function text()
    // {
    //     return match ($this->value) {
    //         self::ADMIN->value => 'Черновик',
    //         self::AUTHOR->value => 'Одобрен',
    //     };
    // }
}

/*
    
return match($this->value){
            0 => 'Черновик',
            5 => 'Одобрен',
            10 => 'Отклонён'
        };
*/