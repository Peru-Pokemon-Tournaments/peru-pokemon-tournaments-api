<?php

namespace App\Services\Tournament;

use App\Contracts\Repositories\CompetitorRepository;
use App\Models\Competitor;
use Illuminate\Support\Collection;

class GetTournamentCompetitorsService
{
    /**
     * The tournament repository.
     *
     * @var CompetitorRepository
     */
    private CompetitorRepository $competitorRepository;

    /**
     * Create new GetTournamentsService.
     *
     * @param   CompetitorRepository $competitorRepository
     * @return  void
     */
    public function __construct(
        CompetitorRepository $competitorRepository
    ) {
        $this->competitorRepository = $competitorRepository;
    }

    /**
     * Retrieve competitors in that tournament.
     *
     * @param   string $tournamentId
     * @return  Collection|Competitor[]
     */
    public function __invoke(string $tournamentId): Collection
    {
        return $this->competitorRepository->findManyEnrolledToTournament($tournamentId);
    }
}
