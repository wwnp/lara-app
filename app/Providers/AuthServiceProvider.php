<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
        // Gate::define('admin', function ($user) {
        //     return $user->roles()->whereIn('role', 'admin')->count() > 0;
        // });
        // Gate::define('author', function ($user) {
        //     dd($user->roles()->whereIn('role', 'author')->count());
        //     return $user->roles()->whereIn('role', 'author')->count() > 0;
        // });
        // Gate::define('moderator', function ($user) {
        //     return $user->roles()->whereIn('role', 'moderator')->count() > 0;
        // });

        Gate::define('posts-create', function ($user) {
            return $user->roles()->whereIn('role', ['author', 'admin'])->count() > 0;
        });
        Gate::define('posts-edit', function ($user, Post $post) {
            return
                $user->roles()->where('role', ['admin'])->count() > 0
                ||
                $user->id === $post->user_id;
        });
        Gate::define('users-manage', function ($user) {
            return $user->roles()->whereIn('role', ['admin'])->count() > 0;
        });
    }
}
