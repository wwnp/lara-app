<?php

use App\Http\Controllers\Auth\Session;

use App\Http\Controllers\All\Comments as AllComments;
use App\Http\Controllers\All\Posts as AllPosts;



use App\Http\Controllers\Tags as AdminTags;
use App\Http\Controllers\Videos as AdminVideos;
use App\Http\Controllers\Admin\Comments as AdminComments;
use App\Http\Controllers\Admin\Categories as AdminCategories;
use App\Http\Controllers\Admin\Posts as AdminPosts;


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

// Route::get('/', function () {
//     return 123;
// });


Route::middleware('auth', 'auth.admin')->prefix("admin")->group(function () {
    Route::controller(AdminComments::class)->group(function () {
        Route::get('/comments', 'index')->name("comments.index");
        Route::put('/comments/{id}/approve', 'approve')->name("comments.approve");
        Route::put('/comments/{id}/restore', 'restore')->name("comments.restore");
        Route::put('/comments/{id}/decline', 'decline')->name("comments.decline");
        Route::get('/comments/new', 'new')->name("comments.new");
        Route::post('/comments/new', 'new')->name("comments.new");
        Route::delete('/comments/{id}', 'destroy')->name("comments.destroy");
    });

    Route::resource('categories', AdminCategories::class)->parameters(["categories" => "id"]);
    Route::resource('tags', AdminTags::class)->parameters(["tags" => "id"]);
    Route::resource('videos', AdminVideos::class)->parameters(["videos" => "id"]);
    Route::resource('posts', AdminPosts::class)->parameters(["posts" => "id"]);

    // Route::controller(AdminPosts::class)->group(function () {
    //     Route::get('/posts', 'index')->name("posts.index");
    //     Route::get('/posts/{id}', 'show')->name("posts.show");
    // });

    // Route::controller(AdminCategories::class)->group(function () {
    //     Route::get('/comments', 'index')->name("comments.index");
    //     Route::put('/comments/{id}/approve', 'approve')->name("comments.approve");
    //     Route::put('/comments/{id}/restore', 'restore')->name("comments.restore");
    //     Route::put('/comments/{id}/decline', 'decline')->name("comments.decline");
    //     Route::get('/comments/new', 'new')->name("comments.new");
    //     Route::post('/comments/new', 'new')->name("comments.new");
    //     Route::delete('/comments/{id}', 'destroy')->name("comments.destroy");
    // });
});


Route::get('/posts', [AllPosts::class, 'index'])->name("posts.index");
Route::get('/posts/slug/{slug}', [AllPosts::class, 'slug'])->name("posts.slug");
Route::get('/posts/{id}', [AllPosts::class, 'show'])->name("posts.show");

// Route::controller(AllPosts::class)->group(function () {
//     Route::get('/posts', 'index')->name("posts.index");
//     Route::get('/posts/{slug}', 'slug')->parameter("posts", "slug")->name("posts.slug");
//     Route::get('/posts/{id}', 'show')->parameter("posts", "id")->name("posts.show");
// });
Route::post('/comments', [AllComments::class, 'store'])->name("comments.store");


// Route::resource('posts', Posts::class)->parameters(["posts" => "id"]);
// Route::middleware('auth')->group(function () {
//     Route::post('/update-request', [Posts::class, 'updateRequest'])->name("posts.updateRequest");
//     Route::resource('posts', Posts::class)->parameters(["posts" => "id"])->whereNumber(["id"]);

//     Route::put('/comments/{id}/approve', [Comments::class, 'approve'])->name("comments.approve");
//     Route::put('/comments/{id}/restore', [Comments::class, 'restore'])->name("comments.restore");
//     Route::put('/comments/{id}/decline', [Comments::class, 'decline'])->name("comments.decline");
//     Route::get('/comments/new', [Comments::class, 'new'])->name("comments.new");
//     Route::post('/comments/new', [Comments::class, 'new'])->name("comments.new");

//     Route::resource('videos', Videos::class);
//     Route::resource('categories', Categories::class)->parameters(["categories" => "id"]);

// });

// Route::resource('comments', Comments::class)->parameters(["comments" => "id"]);


// Route::post('/comments/new', [Comments::class, 'new'])->name("comments.new");





Route::controller(Session::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/auth/login', 'create')->name("login.create");
        Route::post('/auth/login', 'store')->name("login.store");
    });
    Route::middleware('auth')->group(function () {
        Route::get('/auth/profile', 'profile')->name("auth.profile");
        Route::delete('/auth/profile', 'destroy')->name("profile.destroy");
    });
});




// Route::controller(Posts::class)->group(function () {
//     Route::middleware('guest')->group(function () {
//         Route::get('/posts', 'index')->name("posts.index");
//         Route::get('/posts/{id}', 'show')->name("posts.show");
//     });
//     Route::middleware('auth')->group(function () {
        // Route::get('/posts/create', 'create')->name("posts.create");
        // Route::post('/posts', 'store')->name("posts.store");
        // Route::put('/posts/{id}/edit', 'update')->name("posts.update");
        // Route::delete('/posts/{id}', 'delete')->name("posts.delete");
//     });
// });
