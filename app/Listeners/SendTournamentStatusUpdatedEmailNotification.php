<?php

namespace App\Listeners;

use App\Events\TournamentInscriptionStatusUpdated;
use App\Mail\TournamentInscriptionStatusUpdatedMail;
use Illuminate\Support\Facades\Mail;

class SendTournamentStatusUpdatedEmailNotification
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
    public function handle(TournamentInscriptionStatusUpdated $event)
    {
        $email = $event->tournamentInscription->competitor->user->email;

        Mail::to($email)->send(new TournamentInscriptionStatusUpdatedMail($event->tournamentInscription));
    }
}
