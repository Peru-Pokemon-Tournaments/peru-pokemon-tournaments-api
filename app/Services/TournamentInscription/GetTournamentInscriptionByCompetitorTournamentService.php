<?php

namespace App\Services\TournamentInscription;

use App\Contracts\Repositories\TournamentInscriptionRepository;
use App\Models\TournamentInscription;

class GetTournamentInscriptionByCompetitorTournamentService
{
    /**
     * Tournament Inscription Repository.
     *
     * @var TournamentInscriptionRepository
     */
    private TournamentInscriptionRepository $tournamentInscriptionRepository;

    /**
     * Create a new GetTournamentInscriptionByCompetitorTournamentService instance.
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
     * Retrieve tournament inscription.
     *
     * @param string $competitorId
     * @param string $tournamentId
     * @return TournamentInscription|null
     */
    public function __invoke(
        string $competitorId,
        string $tournamentId
    ): ?TournamentInscription {
        return $this->tournamentInscriptionRepository->findOneByTournamentAndCompetitor(
            $tournamentId,
            $competitorId,
        );
    }
}
