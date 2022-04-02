<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Http\Resources\TournamentResource;
use App\Services\Tournament\GetTournamentsService;
use Illuminate\Http\Response;

class GetTournamentsController extends Controller
{
    private GetTournamentsService $getTournamentsService;

    public function __construct(
        GetTournamentsService $getTournamentsService
    )
    {
        $this->getTournamentsService = $getTournamentsService;;
    }

    /**
     * Get complete tournament
     *
     * @param  \App\Models\Tournament $tournament
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function __invoke()
    {
        $tournaments = ($this->getTournamentsService)();

        return response(
            [
                'message' => 'Torneos encontrados',
                'tournaments' => $tournaments->map(function ($tournament) {
                    return TournamentResource::make($tournament);
                }),
            ],
            Response::HTTP_OK,
        );
    }
}
