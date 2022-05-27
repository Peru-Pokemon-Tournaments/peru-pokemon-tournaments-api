<?php

namespace App\Http\Controllers\Game;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Resources\Game\GameResource;
use App\Services\Game\GetGamesService;
use Illuminate\Http\Response;

class GetGamesController extends BasicController
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
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        GetGamesService $getGamesService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
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

        return $this->responseBuilder
            ->setMessage('Juegos encontrados')
            ->setResources('games', GameResource::collection($games))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
