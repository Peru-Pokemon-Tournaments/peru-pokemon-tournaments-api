<?php

namespace App\Http\Controllers\TournamentRule;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\TournamentRule\UpdateTournamentRuleRequest;
use App\Http\Resources\TournamentRule\TournamentRuleResource;
use App\Models\TournamentRule;
use App\Services\TournamentRule\UpdateTournamentRuleService;
use Illuminate\Http\Response;

class UpdateTournamentRuleController extends BasicController
{
    /**
     * The UpdateTournamentRuleService.
     *
     * @var UpdateTournamentRuleService
     */
    private UpdateTournamentRuleService $updateTournamentRuleService;

    /**
     * Create a new UpdateTournamentRuleController instance.
     *
     * @param UpdateTournamentRuleService $updateTournamentRuleService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        UpdateTournamentRuleService $updateTournamentRuleService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->updateTournamentRuleService = $updateTournamentRuleService;
    }

    /**
     * Update tournamentRule.
     *
     * @param TournamentRule $tournamentRule
     * @param UpdateTournamentRuleRequest $request
     * @return Response
     */
    public function __invoke(
        TournamentRule $tournamentRule,
        UpdateTournamentRuleRequest $request
    ): Response {
        $tournamentRule = ($this->updateTournamentRuleService)(
            $tournamentRule,
            $request->validated()
        );

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_rule.update_tournament_rule.ok'))
            ->setResource('tournament_rule', TournamentRuleResource::make($tournamentRule))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
