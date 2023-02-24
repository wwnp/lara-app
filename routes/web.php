<?php

use App\Http\Controllers\Auth\Session;
use App\Http\Controllers\Categories;
use App\Http\Controllers\Comments;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Tags;
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
// */

Route::get('/', function () {
    return 123;
});

// Route::post('/posts/{id}/comment', [Posts::class, 'comment'])->name('posts.comment');

Route::middleware('auth')->group(function () {
    Route::post('/update-request', [Posts::class, 'updateRequest'])->name("posts.updateRequest");
    Route::resource('posts', Posts::class)->parameters(["posts" => "id"])->whereNumber(["id"]);

    Route::put('/comments/{id}/approve', [Comments::class, 'approve'])->name("comments.approve");
    Route::put('/comments/{id}/restore', [Comments::class, 'restore'])->name("comments.restore");
    Route::put('/comments/{id}/decline', [Comments::class, 'decline'])->name("comments.decline");
    Route::get('/comments/new', [Comments::class, 'new'])->name("comments.new");
    Route::post('/comments/new', [Comments::class, 'new'])->name("comments.new");

    Route::resource('videos', Videos::class);
    Route::resource('categories', Categories::class)->parameters(["categories" => "id"]);

    Route::resource('tags', Tags::class)->parameters(["tags" => "id"]);
});

Route::resource('comments', Comments::class)->parameters(["comments" => "id"]);

Route::post('/comments/new', [Comments::class, 'new'])->name("comments.new");

Route::controller(Session::class)->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/auth/login', 'create')->name("login");
        Route::post('/auth/login', 'store')->name("login.store");
    });
    Route::middleware('auth')->group(function () {
        Route::get('/auth/logout', 'exit')->name("login.exit");
        Route::delete('/auth/logout', 'destroy')->name("login.destroy");
    });
});
