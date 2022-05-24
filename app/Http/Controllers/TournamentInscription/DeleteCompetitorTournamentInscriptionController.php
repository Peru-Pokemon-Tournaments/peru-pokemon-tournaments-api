<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Http\Controllers\Controller;
use App\Models\Competitor;
use App\Models\Tournament;
use App\Services\TournamentInscription\DeleteTournamentInscriptionService;
use App\Services\TournamentInscription\GetTournamentInscriptionByCompetitorTournamentService;
use Illuminate\Http\Response;

class DeleteCompetitorTournamentInscriptionController extends Controller
{
    /**
     * The DeleteTournamentInscriptionService.
     *
     * @var DeleteTournamentInscriptionService
     */
    private DeleteTournamentInscriptionService $deleteInscriptionService;

    /**
     * The GetCompetitorTournamentInscriptionController.
     *
     * @var GetTournamentInscriptionByCompetitorTournamentService
     */
    private GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService;

    /**
     * Create a new instance of DeleteTournamentInscriptionController.
     *
     * @param   DeleteTournamentInscriptionService $deleteInscriptionService
     * @param   GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService
     * @return  void
     */
    public function __construct(
        DeleteTournamentInscriptionService $deleteInscriptionService,
        GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService
    ) {
        $this->deleteInscriptionService = $deleteInscriptionService;
        $this->getInscriptionService = $getInscriptionService;
    }

    /**
     * Delete tournament inscription.
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

        $isDeleted = ($this->deleteInscriptionService)(
            $tournamentInscription->id
        );

        return response(
            [
                'message' => ($isDeleted
                    ? 'Se eliminó la inscripción'
                    : 'No se eliminó la inscripción'),
            ],
            Response::HTTP_OK,
        );
    }
}
