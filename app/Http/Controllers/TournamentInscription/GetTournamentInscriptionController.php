<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Http\Controllers\Controller;
use App\Http\Resources\TournamentInscriptionResource;
use App\Models\TournamentInscription;
use Illuminate\Http\Response;

class GetTournamentInscriptionController extends Controller
{
    /**
     * Retrieve tournament inscription
     *
     * @param  \App\Models\TournamentInscription $tournamentInscription
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function __invoke(
        TournamentInscription $tournamentInscription
    )
    {
        return response(
            [
                'message' => 'Inscripción encontrada',
                'tournament_inscription' => TournamentInscriptionResource::make($tournamentInscription),
            ],
            Response::HTTP_OK,
        );
    }
}
