<?php

namespace App\Http\Controllers\Tournament;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Http\Controllers\PaginatedController;
use App\Http\Requests\Tournament\FetchTournamentsRequest;
use App\Http\Resources\Tournament\TournamentResource;
use App\Services\Tournament\FetchTournamentsService;
use Illuminate\Http\Response;

class FetchTournamentsController extends PaginatedController
{
    /**
     * The fetch tournaments service.
     *
     * @var FetchTournamentsService
     */
    private FetchTournamentsService $fetchTournamentsService;

    /**
     * Creates a new FetchTournamentsController instance.
     *
     * @param FetchTournamentsService $fetchTournamentsService
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        FetchTournamentsService $fetchTournamentsService,
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        parent::__construct($paginatedResponseBuilder);
        $this->fetchTournamentsService = $fetchTournamentsService;
    }

    /**
     * Retrieve all tournaments paginated.
     *
     * @param FetchTournamentsRequest $request
     * @return Response
     */
    public function __invoke(FetchTournamentsRequest $request): Response
    {
        $tournamentsPaginated = ($this->fetchTournamentsService)(
            $request->query('page', 1),
            $request->query('pageSize', 15)
        );

        foreach ($tournamentsPaginated->items() as $tournament) {
            $tournament->load([
                'image',
                'tournamentType',
                'devices',
                'games',
                'tournamentFormat',
                'tournamentPrice',
                'tournamentSystems',
                'externalBracket',
            ]);
        }

        return $this->paginatedResponseBuilder
            ->setMessage(trans('endpoints.tournament.fetch_tournaments.ok'))
            ->setResources('tournaments', TournamentResource::collection($tournamentsPaginated))
            ->setLengthAwarePaginator($tournamentsPaginated)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
