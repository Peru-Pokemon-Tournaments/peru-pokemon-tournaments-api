<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\PasswordResetCreated::class => [
            \App\Listeners\SendPasswordResetCreatedEmail::class,
        ],
        \App\Events\TournamentInscriptionCreated::class => [
            \App\Listeners\SendTournamentCreatedEmailNotification::class,
        ],
        \App\Events\TournamentInscriptionUpdated::class => [
            \App\Listeners\SendTournamentUpdatedEmailNotification::class,
        ],
        \App\Events\TournamentInscriptionStatusUpdated::class => [
            \App\Listeners\SendTournamentStatusUpdatedEmailNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
