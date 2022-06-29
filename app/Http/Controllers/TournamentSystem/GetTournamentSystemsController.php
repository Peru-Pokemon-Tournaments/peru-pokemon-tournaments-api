<?php

namespace App\Http\Controllers\TournamentSystem;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Resources\TournamentSystem\TournamentSystemResource;
use App\Services\TournamentSystem\GetTournamentSystemsService;
use Illuminate\Http\Response;

class GetTournamentSystemsController extends BasicController
{
    /**
     * The get tournament systems service.
     *
     * @var GetTournamentSystemsService
     */
    private GetTournamentSystemsService $getTournamentSystemsService;

    /**
     * Create a new GetTournamentSystemsController instance.
     *
     * @param GetTournamentSystemsService $getTournamentSystemsService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        GetTournamentSystemsService $getTournamentSystemsService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->getTournamentSystemsService = $getTournamentSystemsService;
    }

    /**
     * Retrieve all tournament systems.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        $tournamentSystems = ($this->getTournamentSystemsService)();

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_system.get_tournament_systems.ok'))
            ->setResources('tournament_systems', TournamentSystemResource::collection($tournamentSystems))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
