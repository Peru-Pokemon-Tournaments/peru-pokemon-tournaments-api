<?php

namespace App\Http\Controllers\Tournament\TournamentResult;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Http\Controllers\PaginatedController;
use App\Http\Requests\Tournament\TournamentResult\FetchTournamentResultsRequest;
use App\Http\Resources\TournamentResult\TournamentResultResource;
use App\Models\Tournament;
use App\Services\TournamentResult\FetchTournamentResultsService;
use Illuminate\Http\Response;

class FetchTournamentResultsController extends PaginatedController
{
    /**
     * The fetch results service.
     *
     * @var FetchTournamentResultsService
     */
    private FetchTournamentResultsService $fetchTournamentResultsService;

    /**
     * Creates a new FetchTournamentResultsController instance.
     *
     * @param FetchTournamentResultsService $fetchTournamentResultsService
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        FetchTournamentResultsService $fetchTournamentResultsService,
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        parent::__construct($paginatedResponseBuilder);
        $this->fetchTournamentResultsService = $fetchTournamentResultsService;
    }

    /**
     * Retrieve all results paginated.
     *
     * @param Tournament $tournament
     * @param FetchTournamentResultsRequest $request
     * @return Response
     */
    public function __invoke(
        Tournament $tournament,
        FetchTournamentResultsRequest $request
    ): Response {
        $resultsPaginated = ($this->fetchTournamentResultsService)(
            $request->query('page', 1),
            $request->query('pageSize', 15),
            [
                'tournament.id' => $tournament->id,
            ]
        );

        foreach ($resultsPaginated->items() as $tournamentResult) {
            $tournamentResult->load([
                'tournamentInscription.competitor',
                'tournamentInscription.pokemonShowdownTeam',
            ]);
        }

        return $this->paginatedResponseBuilder
            ->setMessage(trans('endpoints.tournament.tournament_result.fetch_tournament_results.ok'))
            ->setResources('results', TournamentResultResource::collection($resultsPaginated))
            ->setLengthAwarePaginator($resultsPaginated)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
