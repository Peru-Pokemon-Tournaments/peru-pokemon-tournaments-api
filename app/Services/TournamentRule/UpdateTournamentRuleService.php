<?php

namespace App\Services\TournamentRule;

use App\Contracts\Repositories\TournamentRuleRepository;
use App\Models\TournamentRule;
use Illuminate\Database\Eloquent\Model;

class UpdateTournamentRuleService
{
    /**
     * The tournament rule repository.
     *
     * @var TournamentRuleRepository
     */
    private TournamentRuleRepository $tournamentRuleRepository;

    /**
     * Create a new UpdateTournamentRuleService instance.
     *
     * @param TournamentRuleRepository $tournamentRuleRepository
     */
    public function __construct(TournamentRuleRepository $tournamentRuleRepository)
    {
        $this->tournamentRuleRepository = $tournamentRuleRepository;
    }

    /**
     * Update a tournament rule.
     *
     * @param TournamentRule|string $tournamentRule
     * @param array $attributes
     * @return TournamentRule|Model
     */
    public function __invoke($tournamentRule, array $attributes): TournamentRule
    {
        $tournamentRuleId = $tournamentRule;

        if ($tournamentRule instanceof TournamentRule) {
            $tournamentRuleId = $tournamentRule->id;
        }

        $this->tournamentRuleRepository->update($tournamentRuleId, $attributes);

        return $this->tournamentRuleRepository->findOne($tournamentRuleId);
    }
}
