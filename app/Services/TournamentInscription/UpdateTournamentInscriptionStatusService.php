<?php

namespace App\Services\TournamentInscription;

use App\Contracts\Repositories\TournamentInscriptionRepository;
use App\Models\TournamentInscription;

class UpdateTournamentInscriptionStatusService
{
    /**
     * Tournament Inscription Repository
     *
     * @var App\Contracts\Repositories\TournamentInscriptionRepository
     */
    private TournamentInscriptionRepository $tournamentInscriptionRepository;

    /**
     * Create a new UpdateTournamentInscriptionStatusService instance.
     *
     * @param   TournamentInscriptionRepository $tournamentInscriptionRepository
     * @return void
     */
    public function __construct(
        TournamentInscriptionRepository $tournamentInscriptionRepository
    )
    {
        $this->tournamentInscriptionRepository = $tournamentInscriptionRepository;
    }

    /**
     * Update a tournament inscription
     *
     * @param string $tournamentInscriptionId
     * @return \App\Models\TournamentInscription
     */
    public function __invoke(
        string $tournamentInscriptionId,
        string $status
    )
    {
        $tournamentInscription = $this->tournamentInscriptionRepository->findOne($tournamentInscriptionId);

        $tournamentInscription->status = $status;

        $this->tournamentInscriptionRepository->save($tournamentInscription);

        return $tournamentInscription;
    }
}
