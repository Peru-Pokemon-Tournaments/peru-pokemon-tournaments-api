<?php

namespace App\Http\Controllers\TournamentType;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\TournamentType\CreateTournamentTypeRequest;
use App\Http\Resources\TournamentType\TournamentTypeResource;
use App\Services\TournamentType\CreateTournamentTypeService;
use Illuminate\Http\Response;

class CreateTournamentTypeController extends BasicController
{
    /**
     * The CreateTournamentTypeService.
     *
     * @var CreateTournamentTypeService
     */
    private CreateTournamentTypeService $createTournamentTypeService;

    /**
     * Create a new CreateTournamentTypeController instance.
     *
     * @param CreateTournamentTypeService $createTournamentTypeService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreateTournamentTypeService $createTournamentTypeService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->createTournamentTypeService = $createTournamentTypeService;
    }

    /**
     * Create tournament type.
     *
     * @param CreateTournamentTypeRequest $request
     * @return Response
     */
    public function __invoke(CreateTournamentTypeRequest $request): Response
    {
        $tournamentType = ($this->createTournamentTypeService)($request->validated());

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_type.create_tournament_type.created'))
            ->setResource('tournament_type', TournamentTypeResource::make($tournamentType))
            ->setStatusCode(Response::HTTP_CREATED)
            ->get();
    }
}
