<?php

namespace App\Enums;

enum Status: int
{
    case new = 0;
    case approved = 1;
    case declined = 2;
}
