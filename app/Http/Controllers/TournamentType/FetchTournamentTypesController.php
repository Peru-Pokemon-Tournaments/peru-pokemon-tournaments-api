<?php

namespace App\Http\Controllers\TournamentType;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Http\Controllers\PaginatedController;
use App\Http\Requests\TournamentType\FetchTournamentTypesRequest;
use App\Http\Resources\TournamentType\TournamentTypeResource;
use App\Services\TournamentType\FetchTournamentTypesService;
use Illuminate\Http\Response;

class FetchTournamentTypesController extends PaginatedController
{
    /**
     * The fetch tournament types service.
     *
     * @var FetchTournamentTypesService
     */
    private FetchTournamentTypesService $fetchTournamentTypesService;

    /**
     * Creates a new FetchTournamentTypesController instance.
     *
     * @param FetchTournamentTypesService $fetchTournamentTypesService
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        FetchTournamentTypesService $fetchTournamentTypesService,
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        parent::__construct($paginatedResponseBuilder);
        $this->fetchTournamentTypesService = $fetchTournamentTypesService;
    }

    /**
     * Retrieve all tournament rules paginated.
     *
     * @param FetchTournamentTypesRequest $request
     * @return Response
     */
    public function __invoke(FetchTournamentTypesRequest $request): Response
    {
        $tournamentTypesPaginated = ($this->fetchTournamentTypesService)(
            $request->query('page', 1),
            $request->query('pageSize', 15)
        );

        return $this->paginatedResponseBuilder
            ->setMessage(trans('endpoints.tournament_type.fetch_tournament_types.ok'))
            ->setResources('tournament_types', TournamentTypeResource::collection($tournamentTypesPaginated))
            ->setLengthAwarePaginator($tournamentTypesPaginated)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
