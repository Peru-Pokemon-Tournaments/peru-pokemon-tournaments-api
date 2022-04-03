<?php

namespace App\Services\TournamentInscription;

use App\Contracts\Repositories\TournamentInscriptionRepository;

class CheckCompetitorIsEnrolledService
{
    /**
     * Tournament Inscription Repository
     *
     * @var App\Contracts\Repositories\TournamentInscriptionRepository
     */
    private TournamentInscriptionRepository $tournamentInscriptionRepository;

    /**
     * Create a new CheckCompetitorIsEnrolledService instance.
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
     * Create a tournament inscription
     *
     * @param string $tournamentId
     * @param string $competitorId
     * @return bool
     */
    public function __invoke(
        string $tournamentId,
        string $competitorId
    )
    {
        $tournamentInscription = $this->tournamentInscriptionRepository->findOneByTournamentAndCompetitor(
            $tournamentId,
            $competitorId,
        );

        return !is_null($tournamentInscription);
    }
}
