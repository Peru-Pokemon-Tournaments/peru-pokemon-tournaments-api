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
            \App\Contracts\Repositories\DeviceRepository::class,
            \App\Repositories\DeviceRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\ExternalBracketRepository::class,
            \App\Repositories\ExternalBracketRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\FileRepository::class,
            \App\Repositories\GoogleDriveFileRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\GameGenerationRepository::class,
            \App\Repositories\GameGenerationRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\GameRepository::class,
            \App\Repositories\GameRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\ImageRepository::class,
            \App\Repositories\ImageRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\PasswordResetRepository::class,
            \App\Repositories\PasswordResetRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\PersonRepository::class,
            \App\Repositories\PersonRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\PokemonShowdownTeamRepository::class,
            \App\Repositories\PokemonShowdownTeamRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\RoleRepository::class,
            \App\Repositories\RoleRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\TournamentFormatRepository::class,
            \App\Repositories\TournamentFormatRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\TournamentInscriptionRepository::class,
            \App\Repositories\TournamentInscriptionRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\TournamentPriceRepository::class,
            \App\Repositories\TournamentPriceRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\TournamentPrizeRepository::class,
            \App\Repositories\TournamentPrizeRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\TournamentRepository::class,
            \App\Repositories\TournamentRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\TournamentResultRepository::class,
            \App\Repositories\TournamentResultRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\TournamentRuleRepository::class,
            \App\Repositories\TournamentRuleRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\TournamentSystemRepository::class,
            \App\Repositories\TournamentSystemRepository::class);
        $this->app->bind(
            \App\Contracts\Repositories\TournamentTypeRepository::class,
            \App\Repositories\TournamentTypeRepository::class);
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
