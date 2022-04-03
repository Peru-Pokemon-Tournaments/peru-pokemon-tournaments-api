<?php

namespace App\Events;

use App\Models\TournamentInscription;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TournamentInscriptionCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The tournament inscription
     *
     * @var App\Models\TournamentInscription
     */
    public TournamentInscription $tournamentInscription;

    /**
     * Create a new event instance.
     *
     * @param  App\Models\TournamentInscription
     * @return void
     */
    public function __construct(TournamentInscription $tournamentInscription)
    {
        $this->tournamentInscription = $tournamentInscription;
    }
}
