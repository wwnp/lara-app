<?php

namespace App\Enums;

enum ButtonTypes: string
{
    case DELETE = 'DELETE';
    case RESTORE = 'RESTORE';
    case APPROVE = 'APPROVE';
    case DECLINE = 'DECLINE';
}
