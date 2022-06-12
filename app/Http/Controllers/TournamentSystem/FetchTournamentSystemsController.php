<?php

namespace App\Http\Controllers\TournamentSystem;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Http\Controllers\PaginatedController;
use App\Http\Requests\TournamentSystem\FetchTournamentSystemsRequest;
use App\Http\Resources\TournamentSystem\TournamentSystemResource;
use App\Services\TournamentSystem\FetchTournamentSystemsService;
use Illuminate\Http\Response;

class FetchTournamentSystemsController extends PaginatedController
{
    /**
     * The fetch tournament systems service.
     *
     * @var FetchTournamentSystemsService
     */
    private FetchTournamentSystemsService $fetchTournamentSystemsService;

    /**
     * Creates a new FetchTournamentSystemsController instance.
     *
     * @param FetchTournamentSystemsService $fetchTournamentSystemsService
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        FetchTournamentSystemsService $fetchTournamentSystemsService,
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        parent::__construct($paginatedResponseBuilder);
        $this->fetchTournamentSystemsService = $fetchTournamentSystemsService;
    }

    /**
     * Retrieve all tournament rules paginated.
     *
     * @param FetchTournamentSystemsRequest $request
     * @return Response
     */
    public function __invoke(FetchTournamentSystemsRequest $request): Response
    {
        $TournamentSystemsPaginated = ($this->fetchTournamentSystemsService)(
            $request->query('page', 1),
            $request->query('pageSize', 15)
        );

        return $this->paginatedResponseBuilder
            ->setMessage(trans('endpoints.tournament_system.fetch_tournament_systems.ok'))
            ->setResources('tournament_systems', TournamentSystemResource::collection($TournamentSystemsPaginated))
            ->setLengthAwarePaginator($TournamentSystemsPaginated)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
