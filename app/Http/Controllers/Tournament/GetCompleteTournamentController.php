<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompleteTournamentResource;
use App\Models\Tournament;
use Illuminate\Http\Response;

class GetCompleteTournamentController extends Controller
{
    /**
     * Get complete tournament.
     *
     * @param Tournament $tournament
     * @return Response
     */
    public function __invoke(Tournament $tournament): Response
    {
        return response(
            [
                'message' => 'Torneo encontrado',
                'tournament' => CompleteTournamentResource::make($tournament),
            ],
            Response::HTTP_OK,
        );
    }
}
