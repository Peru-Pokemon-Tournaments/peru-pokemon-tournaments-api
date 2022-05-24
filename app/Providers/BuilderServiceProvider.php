<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Contracts\Patterns\Builders\ResetUrlBuilder::class,
            \App\Patterns\Builders\FrontendResetUrlBuilder::class
        );
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
