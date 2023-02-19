<?php

use App\Http\Controllers\Comments;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Videos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view("test");
});

// Route::post('/posts/{id}/comment', [Posts::class, 'comment'])->name('posts.comment');
Route::resource('posts', Posts::class)->parameters(["posts" => "id"])->whereNumber(["id"]);

Route::put('/comments/{id}/approve', [Comments::class, 'approve'])->name("comments.approve");
Route::put('/comments/{id}/restore', [Comments::class, 'restore'])->name("comments.restore");
Route::put('/comments/{id}/decline', [Comments::class, 'decline'])->name("comments.decline");
Route::get('/comments/new', [Comments::class, 'new'])->name("comments.new");
Route::post('/comments/new', [Comments::class, 'new'])->name("comments.new");

Route::get('/comments/test', [Comments::class, 'test'])->name("comments.test");
// Route::get('/comments/{id}/edit', [Comments::class, 'edit'])->name("comments.edit");
// Route::get('/comments', [Comments::class, 'index'])->name("comments.index");
Route::resource('comments', Comments::class)->parameters(["comments" => "id"]);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('videos', Videos::class);
