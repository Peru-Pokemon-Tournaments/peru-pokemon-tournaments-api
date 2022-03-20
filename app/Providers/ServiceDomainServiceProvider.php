<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceDomainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\User\CreateCompleteUserService::class,
            \App\Services\User\CreateCompleteUserService::class);
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
