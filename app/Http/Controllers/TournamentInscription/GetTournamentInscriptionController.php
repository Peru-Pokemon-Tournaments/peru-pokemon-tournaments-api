<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Http\Controllers\BasicController;
use App\Http\Resources\TournamentInscription\TournamentInscriptionResource;
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
        $tournamentInscription->load([
            'competitor',
            'pokemonShowdownTeam',
            'tournament',
        ]);

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_inscription.get_tournament_inscription.ok'))
            ->setResource('tournament_inscription', TournamentInscriptionResource::make($tournamentInscription))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
