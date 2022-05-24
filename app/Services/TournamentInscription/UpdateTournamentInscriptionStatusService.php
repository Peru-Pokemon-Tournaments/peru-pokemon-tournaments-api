<?php

namespace App\Services\TournamentInscription;

use App\Contracts\Repositories\TournamentInscriptionRepository;
use App\Models\TournamentInscription;
use Illuminate\Database\Eloquent\Model;

class UpdateTournamentInscriptionStatusService
{
    /**
     * Tournament Inscription Repository.
     *
     * @var TournamentInscriptionRepository
     */
    private TournamentInscriptionRepository $tournamentInscriptionRepository;

    /**
     * Create a new UpdateTournamentInscriptionStatusService instance.
     *
     * @param TournamentInscriptionRepository $tournamentInscriptionRepository
     * @return void
     */
    public function __construct(
        TournamentInscriptionRepository $tournamentInscriptionRepository
    ) {
        $this->tournamentInscriptionRepository = $tournamentInscriptionRepository;
    }

    /**
     * Update a tournament inscription.
     *
     * @param string $tournamentInscriptionId
     * @param string $status
     * @return TournamentInscription|Model|null
     */
    public function __invoke(
        string $tournamentInscriptionId,
        string $status
    ): ?TournamentInscription {
        $tournamentInscription = $this->tournamentInscriptionRepository->findOne($tournamentInscriptionId);

        $tournamentInscription->status = $status;

        $this->tournamentInscriptionRepository->save($tournamentInscription);

        return $tournamentInscription;
    }
}
