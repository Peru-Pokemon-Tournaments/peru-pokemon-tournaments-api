<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Http\Controllers\PaginatedController;
use App\Http\Requests\TournamentInscription\FetchTournamentInscriptionsRequest;
use App\Http\Resources\TournamentInscription\TournamentInscriptionResource;
use App\Services\TournamentInscription\FetchTournamentInscriptionsService;
use Illuminate\Http\Response;

class FetchTournamentInscriptionsController extends PaginatedController
{
    /**
     * The fetch tournament inscriptions service.
     *
     * @var FetchTournamentInscriptionsService
     */
    private FetchTournamentInscriptionsService $fetchTournamentInscriptionsService;

    /**
     * Creates a new FetchTournamentInscriptionsController instance.
     *
     * @param FetchTournamentInscriptionsService $fetchTournamentInscriptionsService
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        FetchTournamentInscriptionsService $fetchTournamentInscriptionsService,
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        parent::__construct($paginatedResponseBuilder);
        $this->fetchTournamentInscriptionsService = $fetchTournamentInscriptionsService;
    }

    /**
     * Retrieve all tournament rules paginated.
     *
     * @param FetchTournamentInscriptionsRequest $request
     * @return Response
     */
    public function __invoke(FetchTournamentInscriptionsRequest $request): Response
    {
        $tournamentInscriptionsPaginated = ($this->fetchTournamentInscriptionsService)(
            $request->query('page', 1),
            $request->query('pageSize', 15),
            $request->query('filters'),
        );

        foreach ($tournamentInscriptionsPaginated->items() as $tournamentInscription) {
            $tournamentInscription->load([
                'competitor',
                'pokemonShowdownTeam',
                'tournament',
            ]);
        }

        return $this->paginatedResponseBuilder
            ->setMessage(trans('endpoints.tournament_inscription.fetch_tournament_inscriptions.ok'))
            ->setResources('tournament_inscriptions', TournamentInscriptionResource::collection($tournamentInscriptionsPaginated))
            ->setLengthAwarePaginator($tournamentInscriptionsPaginated)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
