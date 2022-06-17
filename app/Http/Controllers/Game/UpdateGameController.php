<?php

namespace App\Http\Controllers\Game;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\Game\UpdateGameRequest;
use App\Http\Resources\Game\GameResource;
use App\Models\Game;
use App\Services\Game\UpdateGameService;
use Illuminate\Http\Response;

class UpdateGameController extends BasicController
{
    /**
     * The UpdateGameService.
     *
     * @var UpdateGameService
     */
    private UpdateGameService $updateGameService;

    /**
     * Create a new UpdateGameController instance.
     *
     * @param UpdateGameService $updateGameService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        UpdateGameService $updateGameService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->updateGameService = $updateGameService;
    }

    /**
     * Update game.
     *
     * @param Game $game
     * @param UpdateGameRequest $request
     * @return Response
     */
    public function __invoke(Game $game, UpdateGameRequest $request): Response
    {
        $attributes = [];

        if ($request->filled('name')) {
            $attributes['name'] = $request->input('name');
        }

        if ($request->filled('game_generation.id')) {
            $attributes['game_generation_id'] = $request->input('game_generation.id');
        }

        $game = ($this->updateGameService)($game, $attributes);

        return $this->responseBuilder
            ->setMessage(trans('endpoints.game.update_game.ok'))
            ->setResource('game', GameResource::make($game->load(['gameGeneration'])))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
