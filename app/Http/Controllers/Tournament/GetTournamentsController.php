<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Http\Resources\TournamentResource;
use App\Services\Tournament\GetTournamentsService;
use Illuminate\Http\Response;

class GetTournamentsController extends Controller
{
    /**
     * The GetTournamentsService.
     *
     * @var GetTournamentsService
     */
    private GetTournamentsService $getTournamentsService;

    /**
     * Creates a new GetTournamentsController.
     *
     * @param GetTournamentsService $getTournamentsService
     */
    public function __construct(
        GetTournamentsService $getTournamentsService
    ) {
        $this->getTournamentsService = $getTournamentsService;
    }

    /**
     * Get complete tournament.
     *
     * @return Response
     */
    public function __invoke(): Response
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
