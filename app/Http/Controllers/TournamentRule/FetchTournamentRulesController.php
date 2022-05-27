<?php

namespace App\Http\Controllers\TournamentRule;

use App\Http\Controllers\Controller;
use App\Http\Requests\TournamentRule\FetchTournamentRulesRequest;
use App\Http\Resources\TournamentRule\TournamentRuleResource;
use App\Services\TournamentRule\FetchTournamentRulesService;
use Illuminate\Http\Response;

class FetchTournamentRulesController extends Controller
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
     */
    public function __construct(FetchTournamentRulesService $fetchTournamentRulesService)
    {
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

        return response(
            [
                'message' => 'Reglas de Torneos encontrados',
                'tournament_rules' => TournamentRuleResource::collection($tournamentRulesPaginated),
                'total' => $tournamentRulesPaginated->total(),
                'per_page' => $tournamentRulesPaginated->perPage(),
                'current_page' => $tournamentRulesPaginated->currentPage(),
                'last_page' => $tournamentRulesPaginated->lastPage(),
                'total_pages' => ceil($tournamentRulesPaginated->total() / $tournamentRulesPaginated->perPage()),
            ],
            Response::HTTP_OK
        );
    }
}
