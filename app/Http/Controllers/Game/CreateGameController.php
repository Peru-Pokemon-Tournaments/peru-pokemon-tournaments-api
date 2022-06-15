<?php

namespace App\Http\Controllers\Game;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\Game\CreateGameRequest;
use App\Http\Resources\Game\GameResource;
use App\Services\Game\CreateGameService;
use Illuminate\Http\Response;

class CreateGameController extends BasicController
{
    /**
     * The CreateGameService.
     *
     * @var CreateGameService
     */
    private CreateGameService $createGameService;

    /**
     * Create a new CreateGameController instance.
     *
     * @param CreateGameService $createGameService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreateGameService $createGameService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->createGameService = $createGameService;
    }

    /**
     * Create game.
     *
     * @param CreateGameRequest $request
     * @return Response
     */
    public function __invoke(CreateGameRequest $request): Response
    {
        $game = ($this->createGameService)([
            'name' => $request->input('name'),
            'game_generation_id' => $request->input('game_generation.id'),
        ]);

        return $this->responseBuilder
            ->setMessage(trans('endpoints.game.create_game.created'))
            ->setResource('game', GameResource::make($game))
            ->setStatusCode(Response::HTTP_CREATED)
            ->get();
    }
}
