<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Http\Controllers\Controller;
use App\Models\TournamentInscription;
use App\Services\TournamentInscription\DeleteTournamentInscriptionService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class DeleteTournamentInscriptionController extends Controller
{
    /**
     * The DeleteTournamentInscriptionService.
     *
     * @var DeleteTournamentInscriptionService
     */
    private DeleteTournamentInscriptionService $deleteTournamentInscriptionService;

    /**
     * Create a new instance of DeleteTournamentInscriptionController.
     *
     * @param DeleteTournamentInscriptionService $deleteTournamentInscriptionService
     * @return void
     */
    public function __construct(
        DeleteTournamentInscriptionService $deleteTournamentInscriptionService
    ) {
        $this->deleteTournamentInscriptionService = $deleteTournamentInscriptionService;
    }

    /**
     * Delete tournament inscription.
     *
     * @param TournamentInscription $tournamentInscription
     * @return Response|ResponseFactory
     */
    public function __invoke(
        TournamentInscription $tournamentInscription
    ) {
        $isDeleted = ($this->deleteTournamentInscriptionService)(
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
