<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\FetchGamesRequest;
use App\Http\Resources\Game\GameResource;
use App\Services\Game\FetchGamesService;
use Illuminate\Http\Response;

class FetchGamesController extends Controller
{
    /**
     * The fetch games service.
     *
     * @var FetchGamesService
     */
    private FetchGamesService $fetchGamesService;

    /**
     * Creates a new FetchGamesController instance.
     *
     * @param FetchGamesService $fetchGamesService
     */
    public function __construct(FetchGamesService $fetchGamesService)
    {
        $this->fetchGamesService = $fetchGamesService;
    }

    /**
     * Retrieve all games paginated.
     *
     * @param FetchGamesRequest $request
     * @return Response
     */
    public function __invoke(FetchGamesRequest $request): Response
    {
        $gamesPaginated = ($this->fetchGamesService)(
            $request->query('page', 1),
            $request->query('pageSize', 15)
        );

        return response(
            [
                'message' => 'Juegos encontrados',
                'games' => GameResource::collection($gamesPaginated),
                'total' => $gamesPaginated->total(),
                'per_page' => $gamesPaginated->perPage(),
                'current_page' => $gamesPaginated->currentPage(),
                'last_page' => $gamesPaginated->lastPage(),
                'total_pages' => ceil($gamesPaginated->total() / $gamesPaginated->perPage()),
            ],
            Response::HTTP_OK
        );
    }
}
