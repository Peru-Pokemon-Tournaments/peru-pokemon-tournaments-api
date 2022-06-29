<?php

namespace App\Http\Controllers\TournamentRule;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Resources\TournamentRule\TournamentRuleResource;
use App\Services\TournamentRule\GetTournamentRulesService;
use Illuminate\Http\Response;

class GetTournamentRulesController extends BasicController
{
    /**
     * The get tournament rules service.
     *
     * @var GetTournamentRulesService
     */
    private GetTournamentRulesService $getTournamentRulesService;

    /**
     * Create a new GetTournamentRulesController instance.
     *
     * @param GetTournamentRulesService $getTournamentRulesService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        GetTournamentRulesService $getTournamentRulesService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->getTournamentRulesService = $getTournamentRulesService;
    }

    /**
     * Retrieve all tournament rules.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        $tournamentRules = ($this->getTournamentRulesService)();

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_rule.get_tournament_rules.ok'))
            ->setResources('tournament_rules', TournamentRuleResource::collection($tournamentRules))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
