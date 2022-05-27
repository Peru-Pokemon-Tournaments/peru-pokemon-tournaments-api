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

        $this->app->bind(
            \App\Contracts\Patterns\Builders\ResponseBuilder::class,
            \App\Patterns\Builders\ApiResponseBuilder::class
        );

        $this->app->bind(
            \App\Contracts\Patterns\Builders\PaginatedResponseBuilder::class,
            \App\Patterns\Builders\ApiPaginatedResponseBuilder::class
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
