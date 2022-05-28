<?php

namespace App\Http\Controllers\Tournament\Inscription;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Resources\Competitor\CompetitorResource;
use App\Models\Tournament;
use App\Services\Tournament\GetTournamentCompetitorsService;
use Illuminate\Http\Response;

class GetTournamentCompetitorsController extends BasicController
{
    /**
     * The GetTournamentCompetitorsService.
     *
     * @var GetTournamentCompetitorsService
     */
    private GetTournamentCompetitorsService $getTournamentCompetitorsService;

    /**
     * Create a new instance of GetTournamentCompetitors.
     *
     * @param GetTournamentCompetitorsService $getTournamentCompetitorsService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        GetTournamentCompetitorsService $getTournamentCompetitorsService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->getTournamentCompetitorsService = $getTournamentCompetitorsService;
    }

    /**
     * Retrieve competitors in tournament.
     *
     * @param Tournament $tournament
     * @return Response
     */
    public function __invoke(Tournament $tournament): Response
    {
        $competitors = ($this->getTournamentCompetitorsService)($tournament->id);

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament.inscription.get_tournament_competitors.ok'))
            ->setResources('competitors', CompetitorResource::collection($competitors))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
