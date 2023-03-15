<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GlobalViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $best = [
            [
                "id" => 8,
                "routeName" => "Пример JS кода для создания кнопок тегов при создании поста",
            ],
        ];
        $new = [
            [
                "id" => 3,
                "routeName" => "3 post",
            ],
        ];
        View::share('best', $best);
        View::share('new', $new);
    }
}
