<?php

namespace App\Http\Controllers\Tournament;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Resources\TournamentResource;
use App\Services\Tournament\GetTournamentsService;
use Illuminate\Http\Response;

class GetTournamentsController extends BasicController
{
    /**
     * The GetTournamentsService.
     *
     * @var GetTournamentsService
     */
    private GetTournamentsService $getTournamentsService;

    /**
     * Creates a new GetTournamentsController.
     *
     * @param GetTournamentsService $getTournamentsService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        GetTournamentsService $getTournamentsService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->getTournamentsService = $getTournamentsService;
    }

    /**
     * Get complete tournament.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        $tournaments = ($this->getTournamentsService)();

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament.get_tournaments.ok'))
            ->setResource('tournaments', TournamentResource::collection($tournaments))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
