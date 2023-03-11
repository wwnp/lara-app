<?php

namespace App\Models;

use App\Casts\Base64Json;
use App\Enums\Post\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $guarded = []; // if Error : Array to string conversion
    protected $fillable = ['title', 'content', 'category_id', "tags", "user_id"];
    protected $casts = [
        "status" => Status::class,
        "options" => Base64Json::class,
        // "options" => "array" ,
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
