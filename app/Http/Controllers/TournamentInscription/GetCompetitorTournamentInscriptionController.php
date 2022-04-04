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
     * The GetCompetitorTournamentInscriptionController
     *
     * @var GetCompetitorTournamentInscriptionController
     */
    private GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService;

    /**
     * Create a new instance of GetCompetitorTournamentInscriptionController
     *
     * @param   GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService
     * @return  void
     */
    public function __construct(
        GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService
    )
    {
        $this->getInscriptionService = $getInscriptionService;
    }

    /**
     * Get tournament inscription
     *
     * @param  \App\Models\Tournament $tournament
     * @param  \App\Models\Competitor $competitor
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function __invoke(
        Tournament $tournament,
        Competitor $competitor
    )
    {
        $tournamnentInscription = ($this->getInscriptionService)(
            $competitor->id,
            $tournament->id
        );

        return response(
            [
                'message' => 'Inscripción encontrada',
                'tournament_inscription' =>
                    TournamentInscriptionResource::make($tournamnentInscription),
            ],
            Response::HTTP_OK,
        );
    }
}
