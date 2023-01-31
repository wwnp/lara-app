<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts as PostsController;

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/create', [PostsController::class, 'create']);
Route::get('/posts/edit/{id}', [PostsController::class, 'edit']);

Route::get('/posts/{id}', [PostsController::class, 'show']);

Route::post('/posts/{id}', [PostsController::class, 'update']);
Route::post('/posts', [PostsController::class, 'store']);
