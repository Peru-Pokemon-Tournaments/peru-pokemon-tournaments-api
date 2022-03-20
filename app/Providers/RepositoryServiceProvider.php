<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Contracts\Repositories\CompetitorRepository::class,
            \App\Repositories\CompetitorRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\PersonRepository::class,
            \App\Repositories\PersonRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\UserRepository::class,
            \App\Repositories\UserRepository::class);
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
