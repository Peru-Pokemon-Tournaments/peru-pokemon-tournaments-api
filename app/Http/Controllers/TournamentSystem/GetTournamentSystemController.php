<?php

namespace App\Http\Controllers\TournamentSystem;

use App\Http\Controllers\BasicController;
use App\Http\Resources\TournamentSystem\TournamentSystemResource;
use App\Models\TournamentSystem;
use Illuminate\Http\Response;

class GetTournamentSystemController extends BasicController
{
    /**
     * Retrieve tournament system.
     *
     * @param TournamentSystem $tournamentSystem
     * @return Response
     */
    public function __invoke(TournamentSystem $tournamentSystem): Response
    {
        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_system.get_tournament_system.ok'))
            ->setResource('tournament_system', TournamentSystemResource::make($tournamentSystem))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
