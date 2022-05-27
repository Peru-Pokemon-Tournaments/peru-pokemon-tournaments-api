<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Http\Resources\Competitor\CompetitorResource;
use App\Models\Tournament;
use App\Services\Tournament\GetTournamentCompetitorsService;
use Illuminate\Http\Response;

class GetTournamentCompetitorsController extends Controller
{
    /**
     * The GetTournamentCompetitorsService.
     *
     * @var GetTournamentCompetitorsService
     */
    private GetTournamentCompetitorsService $getTournamentCompetitorsService;

    /**
     * Create a new instance of GetTournamentCompetitors.
     *
     * @param GetTournamentCompetitorsService $getTournamentCompetitorsService
     * @return void
     */
    public function __construct(
        GetTournamentCompetitorsService $getTournamentCompetitorsService
    ) {
        $this->getTournamentCompetitorsService = $getTournamentCompetitorsService;
    }

    /**
     * Retrieve competitors in tournament.
     *
     * @param Tournament $tournament
     * @return Response
     */
    public function __invoke(Tournament $tournament): Response
    {
        $competitors = ($this->getTournamentCompetitorsService)($tournament->id);

        return response(
            [
                'message' => 'Competidores encontrados',
                'competitors' => $competitors->map(function ($competitor) {
                    return CompetitorResource::make($competitor);
                }),
            ],
            Response::HTTP_OK,
        );
    }
}
