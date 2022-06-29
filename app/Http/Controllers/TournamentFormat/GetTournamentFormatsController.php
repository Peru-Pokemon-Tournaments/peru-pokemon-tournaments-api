<?php

namespace App\Http\Controllers\TournamentFormat;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Resources\TournamentFormat\TournamentFormatResource;
use App\Services\TournamentFormat\GetTournamentFormatsService;
use Illuminate\Http\Response;

class GetTournamentFormatsController extends BasicController
{
    /**
     * The get tournament formats service.
     *
     * @var GetTournamentFormatsService
     */
    private GetTournamentFormatsService $getTournamentFormatsService;

    /**
     * Create a new GetTournamentFormatsController instance.
     *
     * @param GetTournamentFormatsService $getTournamentFormatsService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        GetTournamentFormatsService $getTournamentFormatsService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->getTournamentFormatsService = $getTournamentFormatsService;
    }

    /**
     * Retrieve all tournament formats.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        $tournamentFormats = ($this->getTournamentFormatsService)();

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_format.get_tournament_formats.ok'))
            ->setResources('tournament_formats', TournamentFormatResource::collection($tournamentFormats))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
