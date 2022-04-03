<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompleteTournamentResource;
use App\Models\Tournament;
use Illuminate\Http\Response;

class GetCompleteTournamentController extends Controller
{
    /**
     * Get complete tournament
     *
     * @param  \App\Models\Tournament $tournament
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function __invoke(Tournament $tournament)
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
