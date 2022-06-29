<?php

namespace App\Services\TournamentRule;

use App\Contracts\Repositories\TournamentRuleRepository;
use App\Models\TournamentRule;
use Illuminate\Support\Collection;

class GetTournamentRulesService
{
    /**
     * The tournament rule repository.
     *
     * @var TournamentRuleRepository
     */
    private TournamentRuleRepository $tournamentRuleRepository;

    /**
     * Create a new GetTournamentRulesService instance.
     *
     * @param TournamentRuleRepository $tournamentRuleRepository
     */
    public function __construct(TournamentRuleRepository $tournamentRuleRepository)
    {
        $this->tournamentRuleRepository = $tournamentRuleRepository;
    }

    /**
     * Retrieves all tournament rules.
     *
     * @return Collection|TournamentRule[]
     */
    public function __invoke(): Collection
    {
        return $this->tournamentRuleRepository->getAll();
    }
}
