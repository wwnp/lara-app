<?php

use App\Http\Controllers\Address;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\Posts;
use App\Http\Controllers\Comments;
use App\Http\Controllers\Categories;
use App\Http\Controllers\Tags;
use App\Http\Controllers\Videos;

use App\Http\Controllers\Auth\PasswordChange;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\UsersManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/posts/create', [Posts::class, 'create'])->name("posts.create")->middleware(['can:posts-create']);
    Route::post('/posts', [Posts::class, 'store'])->name("posts.store")->middleware(['can:posts-create']);
    Route::get('/posts/{id}/edit', [Posts::class, 'edit'])->name("posts.edit"); // Gate in Controller Posts
    Route::put('/posts/{id}', [Posts::class, 'update'])->name("posts.update"); // Gate in Controller Posts
    Route::delete('/posts/{id}', [Posts::class, 'delete'])->name("posts.delete"); // Gate in Controller Posts

    Route::get('/users', [UsersManage::class, 'index'])->name("users.index")->middleware(['can:users-manage']); // могут зайти те , кто указан в логике метода boot AuthServiceProvider Gate::define('users-manage'
    Route::put('/users/{id}', [UsersManage::class, 'manage'])->name("users.manage")->middleware(['can:users-manage']);

    Route::middleware(['can:comments-manage'])->group(function () {
        Route::get('/comments/new', [Comments::class, 'new'])->name("comments.new");
        Route::get('/comments', [Comments::class, 'index'])->name("comments.index");
        Route::post('/comments', [Comments::class, 'store'])->name("comments.store");
        Route::put('/comments/{id}/restore', [Comments::class, 'restore'])->name("comments.restore");
        Route::put('/comments/{id}/decline', [Comments::class, 'decline'])->name("comments.decline");
        Route::put('/comments/{id}/approve', [Comments::class, 'approve'])->name("comments.approve");
        Route::delete('/comments/{id}', [Comments::class, 'destroy'])->name("comments.destroy");
    });

    Route::middleware(['can:categories-manage'])->group(function () {
        Route::get('/categories', [Categories::class, 'index'])->name("categories.index");
        Route::get('/categories/create', [Categories::class, 'create'])->name("categories.create");
        Route::post('/categories', [Categories::class, 'store'])->name("categories.store");
        Route::get('/categories/{id}/edit', [Categories::class, 'edit'])->name("categories.edit");
        Route::put('/categories/{id}', [Categories::class, 'update'])->name("categories.update");
    });

    Route::middleware(['can:tags-manage'])->group(function () {
        Route::get('/tags', [Tags::class, 'index'])->name("tags.index");
        Route::get('/tags/create', [Tags::class, 'create'])->name("tags.create");
        Route::post('/tags', [Tags::class, 'store'])->name("tags.store");
        Route::get('/tags/{id}/edit', [Tags::class, 'edit'])->name("tags.edit");
        Route::put('/tags/{id}', [Tags::class, 'update'])->name("tags.update");
    });

    Route::middleware(['can:videos-manage'])->group(function () {
        Route::get('/videos', [Videos::class, 'index'])->name("videos.index");
        Route::get('/videos/create', [Videos::class, 'create'])->name("videos.create");
        Route::post('/videos', [Videos::class, 'store'])->name("videos.store");
        Route::get('/videos/{id}/edit', [Videos::class, 'edit'])->name("videos.edit");
        Route::put('/videos/{id}', [Videos::class, 'update'])->name("videos.update");
    });

    // Route::get('/address', [Address::class, 'form'])->name("address.form");
    // Route::post('/address', [Address::class, 'parse'])->name("address.parse");
});
Route::get('/posts', [Posts::class, 'index'])->name("posts.index");
Route::get('/posts/{id}', [Posts::class, 'show'])->name("posts.show");
Route::get('posts/slug/{slug}', [Posts::class, 'slug'])->name("posts.slug");
Route::post('/comments', [Comments::class, 'store'])->name("comments.store");

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


// VERIFING ---------------------------------------------
Route::get('/email/verify', [VerificationController::class, 'notice'])
    ->middleware(['auth'])
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('notification', 'profile.sent_verification_email');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
