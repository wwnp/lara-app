<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    // protected $fillable = ["slug", "title", "desc"];
    protected $guarded = []; // restricted to transfert t fuction CategoryModelccc::create - Categores.php :44

    public static function newModelMethod()
    {
        $query = DB::table("categories")->select("id", "title");
        return $query;
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
// db server(API)    client client client client  