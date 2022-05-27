<?php

namespace App\Http\Controllers\TournamentRule;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Http\Controllers\PaginatedController;
use App\Http\Requests\TournamentRule\FetchTournamentRulesRequest;
use App\Http\Resources\TournamentRule\TournamentRuleResource;
use App\Services\TournamentRule\FetchTournamentRulesService;
use Illuminate\Http\Response;

class FetchTournamentRulesController extends PaginatedController
{
    /**
     * The fetch tournament rules service.
     *
     * @var FetchTournamentRulesService
     */
    private FetchTournamentRulesService $fetchTournamentRulesService;

    /**
     * Creates a new FetchTournamentRulesController instance.
     *
     * @param FetchTournamentRulesService $fetchTournamentRulesService
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        FetchTournamentRulesService $fetchTournamentRulesService,
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        parent::__construct($paginatedResponseBuilder);
        $this->fetchTournamentRulesService = $fetchTournamentRulesService;
    }

    /**
     * Retrieve all tournament rules paginated.
     *
     * @param FetchTournamentRulesRequest $request
     * @return Response
     */
    public function __invoke(FetchTournamentRulesRequest $request): Response
    {
        $tournamentRulesPaginated = ($this->fetchTournamentRulesService)(
            $request->query('page', 1),
            $request->query('pageSize', 15)
        );

        return $this->paginatedResponseBuilder
            ->setMessage('Reglas de Torneos encontrados')
            ->setResources('tournament_rules', TournamentRuleResource::collection($tournamentRulesPaginated))
            ->setLengthAwarePaginator($tournamentRulesPaginated)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
