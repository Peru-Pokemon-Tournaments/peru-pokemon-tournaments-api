<?php

namespace App\Listeners;

use App\Events\TournamentInscriptionCreated;
use App\Mail\TournamentInscriptionCreatedMail;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class SendTournamentCreatedEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(TournamentInscriptionCreated $event)
    {
        $emails = Arr::pluck($event->tournamentInscription->tournament->createdBy->users->toArray(), 'email');
        Mail::to($emails)->send(new TournamentInscriptionCreatedMail($event->tournamentInscription));
    }
}
