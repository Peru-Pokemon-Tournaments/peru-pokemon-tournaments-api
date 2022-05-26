<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Resources\Game\GameResource;
use App\Services\Game\GetGamesService;
use Illuminate\Http\Response;

class GetGamesController extends Controller
{
    /**
     * The get roles service.
     *
     * @var GetGamesService
     */
    private GetGamesService $getGamesService;

    /**
     * Create a new GetRolesController instance.
     *
     * @param GetGamesService $getGamesService
     */
    public function __construct(GetGamesService $getGamesService)
    {
        $this->getGamesService = $getGamesService;
    }

    /**
     * Retrieve all roles.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        $games = ($this->getGamesService)();

        return response(
            [
                'message' => 'Juegos encontrados',
                'games' => GameResource::collection($games),
            ],
            Response::HTTP_OK
        );
    }
}
