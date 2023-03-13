<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\User;
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
        // policies
        $this->registerPolicies();

        //gates
        Gate::define('posts-create', function ($user) {
            return $user->roles()->whereIn('role', ['author'])->count() > 0;
        });
        Gate::define('posts-edit', function (User $user, Post $post) {
            dd($user);
            return
                // $user->roles()->where('role', ['admin'])->count() > 0
                // ||
                $user->id === $post->user_id;
        });
        Gate::define('users-manage', function ($user) {
            return $user->roles()->whereIn('role', ['admin'])->count() > 0;
        });
    }
}
