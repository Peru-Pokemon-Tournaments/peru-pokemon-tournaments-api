<?php

namespace App\Events;

use App\Models\TournamentInscription;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TournamentInscriptionUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The tournament inscription.
     *
     * @var TournamentInscription
     */
    public TournamentInscription $tournamentInscription;

    /**
     * Create a new event instance.
     *
     * @param TournamentInscription $tournamentInscription
     * @return void
     */
    public function __construct(TournamentInscription $tournamentInscription)
    {
        $this->tournamentInscription = $tournamentInscription;
    }
}
