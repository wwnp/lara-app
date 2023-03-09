<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dadata\DadataClient;
use Illuminate\Support\Facades\Route;

class DaDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DadataClient::class, function () {
            return new DadataClient(config("dadata.token"), config("dadata.secret"));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
