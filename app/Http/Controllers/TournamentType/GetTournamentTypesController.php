<?php

namespace App\Http\Controllers\TournamentType;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Resources\TournamentType\TournamentTypeResource;
use App\Services\TournamentType\GetTournamentTypesService;
use Illuminate\Http\Response;

class GetTournamentTypesController extends BasicController
{
    /**
     * The get tournament types service.
     *
     * @var GetTournamentTypesService
     */
    private GetTournamentTypesService $getTournamentTypesService;

    /**
     * Create a new GetTournamentTypesController instance.
     *
     * @param GetTournamentTypesService $getTournamentTypesService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        GetTournamentTypesService $getTournamentTypesService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->getTournamentTypesService = $getTournamentTypesService;
    }

    /**
     * Retrieve all tournament types.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        $tournamentTypes = ($this->getTournamentTypesService)();

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_type.get_tournament_types.ok'))
            ->setResources('tournament_types', TournamentTypeResource::collection($tournamentTypes))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
