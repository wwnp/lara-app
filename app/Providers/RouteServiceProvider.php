<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = "/posts";

    public function boot()
    {
        // $this->setHomeConstant();
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    // protected function setHomeConstant()
    // {
    //     $user = Auth::user();
    //     if ($user && $user->isAdmin()) {
    //         define('HOME', '/nimda/posts');
    //     } elseif ($user && $user->isAuthor()) {
    //         define('HOME', '/rohtua/posts');
    //     } else {
    //         define('HOME', '/posts');
    //     }
    // }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
    protected function configurePattern()
    {
        Route::pattern("id", '^[1-9]+\d*$');
        Route::pattern("slug", '^[a-z]{3,15}$');
    }
}
