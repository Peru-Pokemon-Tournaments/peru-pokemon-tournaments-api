<?php

namespace App\Services\TournamentRule;

use App\Contracts\Repositories\TournamentRuleRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FetchTournamentRulesService
{
    /**
     * The tournament rule repository.
     *
     * @var TournamentRuleRepository
     */
    private TournamentRuleRepository $tournamentRuleRepository;

    /**
     * Create a new FetchTournamentRulesService instance.
     *
     * @param TournamentRuleRepository $tournamentRuleRepository
     */
    public function __construct(TournamentRuleRepository $tournamentRuleRepository)
    {
        $this->tournamentRuleRepository = $tournamentRuleRepository;
    }

    /**
     * Retrieve all tournament rules paginated.
     *
     * @param int $page
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function __invoke(int $page, int $pageSize): LengthAwarePaginator
    {
        return $this->tournamentRuleRepository->getPaginated($page, $pageSize);
    }
}
