<?php

namespace App\Http\Controllers\TournamentType;

use App\Http\Controllers\BasicController;
use App\Http\Resources\TournamentType\TournamentTypeResource;
use App\Models\TournamentType;
use Illuminate\Http\Response;

class GetTournamentTypeController extends BasicController
{
    /**
     * Retrieve tournament type.
     *
     * @param TournamentType $tournamentType
     * @return Response
     */
    public function __invoke(TournamentType $tournamentType): Response
    {
        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_type.get_tournament_type.ok'))
            ->setResource('tournament_type', TournamentTypeResource::make($tournamentType))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
