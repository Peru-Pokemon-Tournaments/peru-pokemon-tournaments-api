<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\BasicController;
use App\Http\Resources\CompleteTournamentResource;
use App\Models\Tournament;
use Illuminate\Http\Response;

class GetCompleteTournamentController extends BasicController
{
    /**
     * Get complete tournament.
     *
     * @param Tournament $tournament
     * @return Response
     */
    public function __invoke(Tournament $tournament): Response
    {
        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament.get_complete_tournament.ok'))
            ->setResource('tournament', CompleteTournamentResource::make($tournament))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
