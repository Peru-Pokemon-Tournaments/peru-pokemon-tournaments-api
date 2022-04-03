<?php

namespace App\Listeners;

use App\Events\TournamentInscriptionUpdated;
use App\Mail\TournamentInscriptionUpdatedMail;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class SendTournamentUpdatedEmailNotification
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
    public function handle(TournamentInscriptionUpdated $event)
    {
        $emails = Arr::pluck($event->tournamentInscription->tournament->createdBy->users->toArray(), 'email');
        Mail::to($emails)->send(new TournamentInscriptionUpdatedMail($event->tournamentInscription));
    }
}
