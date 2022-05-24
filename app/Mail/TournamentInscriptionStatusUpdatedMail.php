<?php

namespace App\Mail;

use App\Models\TournamentInscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TournamentInscriptionStatusUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The tournament inscription.
     *
     * @var TournamentInscription
     */
    public TournamentInscription $tournamentInscription;

    /**
     * Create a new message instance.
     *
     * @param  TournamentInscription $tournamentInscription
     * @return void
     */
    public function __construct(TournamentInscription $tournamentInscription)
    {
        $this->tournamentInscription = $tournamentInscription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        $competitorName = $this->tournamentInscription->competitor->fullName;
        $tournamentTitle = $this->tournamentInscription->tournament->title;

        return $this->view('mails.tournament-inscription-status')
                    ->subject('Se ha actualizado el estado de su inscripción al torneo "' . $tournamentTitle . '"');
    }
}
