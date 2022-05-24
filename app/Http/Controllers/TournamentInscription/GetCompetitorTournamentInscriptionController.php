<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Http\Controllers\Controller;
use App\Http\Resources\TournamentInscriptionResource;
use App\Models\Competitor;
use App\Models\Tournament;
use App\Services\TournamentInscription\GetTournamentInscriptionByCompetitorTournamentService;
use Illuminate\Http\Response;

class GetCompetitorTournamentInscriptionController extends Controller
{
    /**
     * The GetCompetitorTournamentInscriptionController.
     *
     * @var GetTournamentInscriptionByCompetitorTournamentService
     */
    private GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService;

    /**
     * Create a new instance of GetCompetitorTournamentInscriptionController.
     *
     * @param GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService
     * @return void
     */
    public function __construct(
        GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService
    ) {
        $this->getInscriptionService = $getInscriptionService;
    }

    /**
     * Get tournament inscription.
     *
     * @param Tournament $tournament
     * @param Competitor $competitor
     * @return Response
     */
    public function __invoke(
        Tournament $tournament,
        Competitor $competitor
    ): Response {
        $tournamentInscription = ($this->getInscriptionService)(
            $competitor->id,
            $tournament->id
        );

        return response(
            [
                'message' => 'Inscripción encontrada',
                'tournament_inscription' => TournamentInscriptionResource::make($tournamentInscription),
            ],
            Response::HTTP_OK,
        );
    }
}
