<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts as PostsController;
use App\Http\Controllers\Categories as CategoriesController;
use App\Http\Controllers\CategoriesAdmin as CategoriesAdminController;
use App\Http\Controllers\Goods as GoodsController;
use App\Http\Controllers\Comments as CommentsController;

// index create store show edit update destroy

Route::get('/posts', [PostsController::class, 'index'])->name("posts.index");
Route::get('/posts/create', [PostsController::class, 'create'])->name("posts.create");
Route::post('/posts', [PostsController::class, 'store'])->name("posts.store");
Route::get('/posts/{id}', [PostsController::class, 'show'])->name("posts.show");
Route::get('/posts/{id}/edit', [PostsController::class, 'edit'])->name("posts.edit");
Route::put('/posts/{id}', [PostsController::class, 'update'])->name("posts.update");
Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name("posts.destroy");

// --------------------------

// Route::get('/category/{slug}', [CategoriesController::class, 'bySlug'])->name("categories.byslug");
Route::get('/categories/trash', [CategoriesAdminController::class, 'trash'])->name("categories.trash");
Route::put('/categories/{id}/restore', [CategoriesAdminController::class, 'restore'])->name("categories.restore");
Route::put('/categories/{id}/permadestroy', [CategoriesAdminController::class, 'permadestroy'])->name("categories.permadestroy");
Route::resource('categories', CategoriesAdminController::class)->whereNumber(["category"]);

// --------------------------

Route::get('/', [CategoriesController::class, 'index'])->name('home');
Route::get('/test', [CategoriesController::class, 'testNewModelMethod'])->name('test');
Route::get('/category/{slug}', [CategoriesController::class, 'show'])->name('category');
//before php artisan make:controller Categories --resourse ;resource сущность для кот мы хотим сделать все круд операции

// IN OHTER WAY
// Route::prefix('/categories')->controller(CategoriesController::class)->group(function () {
//     Route::get("/", "index");
//     Route::get('/create', 'create');
//     Route::post('', 'store');
//     Route::get('/{category}', 'show');
//     Route::get('/{category}/edit', 'edit');
//     Route::put('/{category}', 'update');php artisan optimize clear
//     Route::delete('/{category}', 'delete');
// });
// or

// --------------------------
Route::resource('goods', GoodsController::class);

// --------------------------
Route::post('comments/{id}', [CommentsController::class, 'store'])->name('comments.store');
// Route::resource('comments', CommentsController::cToo few arguments to function App\Http\Controllers\CommentController::store(), 1 passed and exactly 2 expectedlass);
