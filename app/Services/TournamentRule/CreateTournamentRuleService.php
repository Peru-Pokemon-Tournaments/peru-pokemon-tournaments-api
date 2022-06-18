<?php

namespace App\Services\TournamentRule;

use App\Contracts\Repositories\TournamentRuleRepository;
use App\Models\TournamentRule;

class CreateTournamentRuleService
{
    /**
     * The TournamentRule repository.
     *
     * @var TournamentRuleRepository
     */
    private TournamentRuleRepository $tournamentRuleRepository;

    /**
     * Create a new CreateTournamentRuleService instance.
     *
     * @param TournamentRuleRepository $tournamentRuleRepository
     */
    public function __construct(TournamentRuleRepository $tournamentRuleRepository)
    {
        $this->tournamentRuleRepository = $tournamentRuleRepository;
    }

    /**
     * Create a new tournament rule.
     *
     * @param array $attributes
     * @return TournamentRule
     */
    public function __invoke(array $attributes): TournamentRule
    {
        $tournamentRule = new TournamentRule($attributes);

        $this->tournamentRuleRepository->save($tournamentRule);

        return $tournamentRule;
    }
}
