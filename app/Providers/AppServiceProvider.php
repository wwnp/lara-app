<?php

namespace App\Providers;

use App\Rules\RecaptchaRule;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Paginator::useBootstrap();
        // Validator::extend('recaptcha', RecaptchaRule::class . '@passes');
        DB::beforeExecuting(function ($sql, $params) {
            // echo  "<pre>";
            // print_r($sql);
            // print_r($params);
            // echo "</pre>";
        });
    }
}
