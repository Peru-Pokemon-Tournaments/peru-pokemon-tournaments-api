<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Http\Controllers\Controller;
use App\Http\Resources\TournamentInscriptionResource;
use App\Models\TournamentInscription;
use Illuminate\Http\Response;

class GetTournamentInscriptionController extends Controller
{
    /**
     * Retrieve tournament inscription.
     *
     * @param TournamentInscription $tournamentInscription
     * @return Response
     */
    public function __invoke(
        TournamentInscription $tournamentInscription
    ): Response {
        return response(
            [
                'message' => 'Inscripción encontrada',
                'tournament_inscription' => TournamentInscriptionResource::make($tournamentInscription),
            ],
            Response::HTTP_OK,
        );
    }
}
