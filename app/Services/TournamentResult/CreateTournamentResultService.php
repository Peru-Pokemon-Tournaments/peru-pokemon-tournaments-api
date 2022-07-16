<?php

namespace App\Services\TournamentResult;

use App\Contracts\Repositories\TournamentInscriptionRepository;
use App\Contracts\Repositories\TournamentResultRepository;
use App\Models\Competitor;
use App\Models\Tournament;
use App\Models\TournamentResult;

class CreateTournamentResultService
{
    /**
     * The TournamentResult repository.
     *
     * @var TournamentResultRepository
     */
    private TournamentResultRepository $tournamentResultRepository;

    /**
     * The TournamentInscriptionRepository.
     *
     * @var TournamentInscriptionRepository
     */
    private TournamentInscriptionRepository $tournamentInscriptionRepository;

    /**
     * Create a new CreateTournamentResultService instance.
     *
     * @param TournamentResultRepository $tournamentResultRepository
     * @param TournamentInscriptionRepository $tournamentInscriptionRepository
     */
    public function __construct(
        TournamentResultRepository $tournamentResultRepository,
        TournamentInscriptionRepository $tournamentInscriptionRepository
    ) {
        $this->tournamentResultRepository = $tournamentResultRepository;
        $this->tournamentInscriptionRepository = $tournamentInscriptionRepository;
    }

    /**
     * Create a new tournament result.
     *
     * @param int $score
     * @param int $place
     * @param string|Competitor $competitor
     * @param string|Tournament $tournament
     * @return TournamentResult
     */
    public function __invoke(
        int $score,
        int $place,
        $competitor,
        $tournament
    ): TournamentResult {
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

        $tournamentResult = new TournamentResult([
            'score' => $score,
            'place' => $place,
            'tournament_id' => $tournament,
            'tournament_inscription_id' => $tournamentInscription->id,
        ]);

        $this->tournamentResultRepository->save($tournamentResult);

        return $tournamentResult;
    }
}
