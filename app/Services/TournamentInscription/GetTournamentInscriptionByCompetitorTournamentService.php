<?php

namespace App\Services\TournamentInscription;

use App\Contracts\Repositories\TournamentInscriptionRepository;

class GetTournamentInscriptionByCompetitorTournamentService
{
    /**
     * Tournament Inscription Repository
     *
     * @var App\Contracts\Repositories\TournamentInscriptionRepository
     */
    private TournamentInscriptionRepository $tournamentInscriptionRepository;

    /**
     * Create a new GetTournamentInscriptionByCompetitorTournamentService instance.
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
     * Retrieve tournament inscription
     *
     * @param string $competitorId
     * @param string $tournamentId
     * @return \App\Models\TournamentInscription
     */
    public function __invoke(
        string $competitorId,
        string $tournamentId
    )
    {
        return $this->tournamentInscriptionRepository->findOneByTournamentAndCompetitor(
            $tournamentId,
            $competitorId,
        );
    }
}
