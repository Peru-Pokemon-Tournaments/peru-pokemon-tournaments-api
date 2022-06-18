<?php

namespace App\Http\Controllers\TournamentRule;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\TournamentRule\CreateTournamentRuleRequest;
use App\Http\Resources\TournamentRule\TournamentRuleResource;
use App\Services\TournamentRule\CreateTournamentRuleService;
use Illuminate\Http\Response;

class CreateTournamentRuleController extends BasicController
{
    /**
     * The CreateTournamentRuleService.
     *
     * @var CreateTournamentRuleService
     */
    private CreateTournamentRuleService $createTournamentRuleService;

    /**
     * Create a new CreateTournamentRuleController instance.
     *
     * @param CreateTournamentRuleService $createTournamentRuleService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreateTournamentRuleService $createTournamentRuleService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->createTournamentRuleService = $createTournamentRuleService;
    }

    /**
     * Create TournamentRule.
     *
     * @param CreateTournamentRuleRequest $request
     * @return Response
     */
    public function __invoke(CreateTournamentRuleRequest $request): Response
    {
        $tournamentRule = ($this->createTournamentRuleService)($request->validated());

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_rule.create_tournament_rule.created'))
            ->setResource('tournament_rule', TournamentRuleResource::make($tournamentRule))
            ->setStatusCode(Response::HTTP_CREATED)
            ->get();
    }
}
