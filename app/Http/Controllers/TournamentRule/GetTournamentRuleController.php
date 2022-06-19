<?php

namespace App\Http\Controllers\TournamentRule;

use App\Http\Controllers\BasicController;
use App\Http\Resources\TournamentRule\TournamentRuleResource;
use App\Models\TournamentRule;
use Illuminate\Http\Response;

class GetTournamentRuleController extends BasicController
{
    /**
     * Retrieve tournament rule.
     *
     * @param TournamentRule $tournamentRule
     * @return Response
     */
    public function __invoke(TournamentRule $tournamentRule): Response
    {
        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_rule.get_tournament_rule.ok'))
            ->setResource('tournament_rule', TournamentRuleResource::make($tournamentRule))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
