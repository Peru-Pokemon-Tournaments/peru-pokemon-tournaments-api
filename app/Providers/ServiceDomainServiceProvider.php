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
        $this->app->bind(
            \App\Services\User\GetUserByEmailService::class,
            \App\Services\User\GetUserByEmailService::class);
        $this->app->bind(
            \App\Services\User\LoginUserService::class,
            \App\Services\User\LoginUserService::class);
        $this->app->bind(
            \App\Services\Tournament\CreateCompleteTournamentService::class,
            \App\Services\Tournament\CreateCompleteTournamentService::class);
        $this->app->bind(
            \App\Services\Tournament\GetTournamentCompetitorsService::class,
            \App\Services\Tournament\GetTournamentCompetitorsService::class);
        $this->app->bind(
            \App\Services\TournamentInscription\CreateCompleteTournamentInscriptionService::class,
            \App\Services\TournamentInscription\CreateCompleteTournamentInscriptionService::class);
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
