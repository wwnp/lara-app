<?php

use App\Http\Controllers\Address;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\Tags as AdminTags;
use App\Http\Controllers\Videos as AdminVideos;
use App\Http\Controllers\Admin\Comments as AdminComments;
use App\Http\Controllers\Admin\Categories as AdminCategories;
use App\Http\Controllers\Admin\Posts as AdminPosts;

use App\Http\Controllers\Author\Posts as AuthorPosts;
use App\Http\Controllers\Author\Comments as AuthorComments;

use App\Http\Controllers\Guest\Posts as GuestPosts;
use App\Http\Controllers\Guest\Comments as GuestComments;

use App\Http\Controllers\Auth\PasswordChange;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth::routes(['verify' => true]);

Route::middleware(['admin'])->prefix("admin")->group(function () {
    // dd(Auth::user());
    Route::resource('posts', AdminPosts::class)->parameters(["posts" => "id"]);
    Route::get('/comments', [AdminComments::class, 'index'])->name("comments.index");
    Route::post('/comments', [AdminComments::class, 'store'])->name("comments.store");
    Route::put('/comments/{id}/approve', [AdminComments::class, 'approve'])->name("comments.approve");
    Route::put('/comments/{id}/restore', [AdminComments::class, 'restore'])->name("comments.restore");
    Route::put('/comments/{id}/decline', [AdminComments::class, 'decline'])->name("comments.decline");
    Route::get('/comments/new', [AdminComments::class, 'new'])->name("comments.new");
    Route::post('/comments/new', [AdminComments::class, 'new'])->name("comments.new");
    Route::delete('/comments/{id}', [AdminComments::class, 'destroy'])->name("comments.destroy");

    Route::resource('categories', AdminCategories::class)->parameters(["categories" => "id"]);
    Route::resource('tags', AdminTags::class)->parameters(["tags" => "id"]);
    Route::resource('videos', AdminVideos::class)->parameters(["videos" => "id"]);
    Route::get('posts/slug/{slug}', [AdminPosts::class, 'slug'])->name("posts.slug");
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/comments', [AuthorComments::class, 'store'])->name("comments.store");

    Route::get('posts/slug/{slug}', [AuthorPosts::class, 'slug'])->name("posts.slug");
    Route::resource('posts', AuthorPosts::class)->parameters(["posts" => "id"]);

    Route::get('/address', [Address::class, 'form'])->name("address.form");
    Route::post('/address', [Address::class, 'parse'])->name("address.parse");
});

Route::post('/comments', [GuestComments::class, 'store'])->name("comments.store");
Route::get('posts/slug/{slug}', [GuestPosts::class, 'slug'])->name("posts.slug");
Route::resource('posts', GuestPosts::class)->parameters(["posts" => "id"]);










// AUTH ---------------------------------------------
Route::middleware('guest')->group(function () {
    Route::get('/auth/login', [AuthenticatedSessionController::class, 'create'])->name("login.create");
    Route::post('/auth/login', [AuthenticatedSessionController::class, 'store'])->name("login.store");
    Route::get('/auth/signup', [RegisteredUserController::class, 'create'])->name("signup.create");
    Route::post('/auth/signup', [RegisteredUserController::class, 'store'])->name("signup.store");
});

Route::middleware('auth')->group(function () {
    Route::get('/auth/profile', [ProfileController::class, 'index'])->name("profile.index");
    Route::delete('/auth/profile', [ProfileController::class, 'destroy'])->name("profile.destroy");
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/auth/profile/edit', [ProfileController::class, 'edit'])->name("profile.edit");
    Route::put('/auth/profile/edit', [ProfileController::class, 'update'])->name("profile.update");
    Route::put('/password', [PasswordChange::class, 'update'])->name("password.update");
});

Route::get('/static/verify', function () {
    return redirect()->route('profile.index')->with('notification', 'profile.need_verified');
})->name('verification.notice');
