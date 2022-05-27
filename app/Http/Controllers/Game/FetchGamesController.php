<?php

namespace App\Http\Controllers\Game;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Http\Controllers\PaginatedController;
use App\Http\Requests\Game\FetchGamesRequest;
use App\Http\Resources\Game\GameResource;
use App\Services\Game\FetchGamesService;
use Illuminate\Http\Response;

class FetchGamesController extends PaginatedController
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
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        FetchGamesService $fetchGamesService,
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        parent::__construct($paginatedResponseBuilder);
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

        return $this->paginatedResponseBuilder
            ->setMessage('Juegos encontrados')
            ->setResources('games', GameResource::collection($gamesPaginated))
            ->setLengthAwarePaginator($gamesPaginated)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
