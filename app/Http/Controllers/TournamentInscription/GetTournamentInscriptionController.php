<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Http\Controllers\BasicController;
use App\Http\Resources\TournamentInscriptionResource;
use App\Models\TournamentInscription;
use Illuminate\Http\Response;

class GetTournamentInscriptionController extends BasicController
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
        return $this->responseBuilder
            ->setMessage('Inscripción encontrada')
            ->setResource('tournament_inscription', TournamentInscriptionResource::make($tournamentInscription))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
