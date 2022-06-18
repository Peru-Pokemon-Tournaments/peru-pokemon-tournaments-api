<?php

namespace App\Http\Controllers\TournamentSystem;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\TournamentSystem\CreateTournamentSystemRequest;
use App\Http\Resources\TournamentSystem\TournamentSystemResource;
use App\Services\TournamentSystem\CreateTournamentSystemService;
use Illuminate\Http\Response;

class CreateTournamentSystemController extends BasicController
{
    /**
     * The CreateTournamentSystemService.
     *
     * @var CreateTournamentSystemService
     */
    private CreateTournamentSystemService $createTournamentSystemService;

    /**
     * Create a new CreateTournamentSystemController instance.
     *
     * @param CreateTournamentSystemService $createTournamentSystemService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreateTournamentSystemService $createTournamentSystemService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->createTournamentSystemService = $createTournamentSystemService;
    }

    /**
     * Create tournament system.
     *
     * @param CreateTournamentSystemRequest $request
     * @return Response
     */
    public function __invoke(CreateTournamentSystemRequest $request): Response
    {
        $tournamentSystem = ($this->createTournamentSystemService)($request->validated());

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_system.create_tournament_system.created'))
            ->setResource('tournament_system', TournamentSystemResource::make($tournamentSystem))
            ->setStatusCode(Response::HTTP_CREATED)
            ->get();
    }
}
