<?php

namespace App\Services\TournamentResult;

use App\Contracts\Repositories\TournamentInscriptionRepository;
use App\Models\Competitor;
use App\Models\Tournament;

class CheckTournamentResultPlaceExists
{
    /**
     * The TournamentInscriptionRepository.
     *
     * @var TournamentInscriptionRepository
     */
    private TournamentInscriptionRepository $tournamentInscriptionRepository;

    /**
     * Create a new CheckTournamentResultPlaceExists instance.
     *
     * @param TournamentInscriptionRepository $tournamentInscriptionRepository
     */
    public function __construct(
        TournamentInscriptionRepository $tournamentInscriptionRepository
    ) {
        $this->tournamentInscriptionRepository = $tournamentInscriptionRepository;
    }

    /**
     * Check if a tournament result has been committed.
     *
     * @param int $place
     * @param string|Competitor $competitor
     * @param string|Tournament $tournament
     * @return bool
     */
    public function __invoke(
        int $place,
        $competitor,
        $tournament
    ): bool {
        if ($competitor instanceof Competitor) {
            $competitor = $competitor->id;
        }

        if ($tournament instanceof Tournament) {
            $tournament = $tournament->id;
        }

        $tournamentInscription = $this->tournamentInscriptionRepository->findOneByTournamentAndCompetitor(
            $tournament,
            $competitor
        );

        return
            $tournamentInscription &&
            $tournamentInscription->tournamentResult()->exists() &&
            $tournamentInscription->tournamentResult->place != $place;
    }
}
