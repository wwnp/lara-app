<?php

use App\Http\Controllers\Address;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\Posts;
use App\Http\Controllers\Comments;

use App\Http\Controllers\Auth\PasswordChange;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/email/verify', [VerificationController::class, 'notice'])
    ->middleware(['auth'])
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    // dd($request);
    $request->user()->sendEmailVerificationNotification();
    return back()->with('notification', 'profile.sent_verification_email');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['can:admin'])->group(function () {
        Route::get('posts/slug/{slug}', [Posts::class, 'slug'])->name("posts.slug");
        Route::resource('posts', Posts::class)->parameters(['posts' => 'id']);

        Route::get('/comments', [Comments::class, 'index'])->name("comments.index");
        Route::post('/comments', [Comments::class, 'store'])->name("comments.store");
        Route::put('/comments/{id}/restore', [Comments::class, 'restore'])->name("comments.restore");
        Route::put('/comments/{id}/decline', [Comments::class, 'decline'])->name("comments.decline");
        Route::put('/comments/{id}/approve', [Comments::class, 'approve'])->name("comments.approve");
        Route::get('/comments/new', [Comments::class, 'new'])->name("comments.new");
        Route::post('/comments/new', [Comments::class, 'new'])->name("comments.new");
        Route::delete('/comments/{id}', [Comments::class, 'destroy'])->name("comments.destroy");

        Route::resource('categories', Categories::class)->parameters(["categories" => "id"]);
        Route::resource('tags', Tags::class)->parameters(["tags" => "id"]);
        Route::resource('videos', Videos::class)->parameters(["videos" => "id"]);

        Route::get('/address', [Address::class, 'form'])->name("address.form");
        Route::post('/address', [Address::class, 'parse'])->name("address.parse");
    });

    Route::middleware(['can:author'])->group(function () {
    });
    Route::middleware(['can:moderator'])->group(function () {
    });
});

Route::post('/comments', [Comments::class, 'store'])->name("comments.store");
Route::get('posts/slug/{slug}', [Posts::class, 'slug'])->name("posts.slug");
Route::get('posts', [Posts::class, 'index'])->name("posts.index");
Route::get('posts/{id}', [Posts::class, 'show'])->name("posts.show");

// Route::middleware(['auth', 'verified', 'author'])->group(function () {
//     //
//     Route::post('/comments', [AuthorComments::class, 'store'])->name("author.comments.store");

//     Route::get('posts/slug/{slug}', [AuthorPosts::class, 'slug'])->name("author.posts.slug");
//     Route::resource('posts', AuthorPosts::class, ['as' => 'author'])->parameters(["posts" => "id"]);


// });














// AUTH ---------------------------------------------

// Route::get('/static/verify', function () {
//     return redirect()->route('profile.index')->with('notification', 'profile.need_verified');
// })->name('verification.notice');

// Route::get('/static/verify/verify', function (Request $request) {
//     // dd($request->user());
//     $request->user()->sendEmailVerificationNotification();
//     return redirect()->route('profile.index')->with('notification', 'profile.sent_verification_email');
// })->name('verification.verify');

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





// dd(Auth::user());
