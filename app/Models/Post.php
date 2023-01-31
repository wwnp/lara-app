<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = []; // если в контроллере укаать лишние ключи в data, то будет ошибка
    // protected $fillable = ["title", "content"]; // если в контроллере укаать лишние ключи в data, то они не будут исп-ся, ПРИМЕР ОТКЛЕИТЬ СРФС ТОКЕН
}
