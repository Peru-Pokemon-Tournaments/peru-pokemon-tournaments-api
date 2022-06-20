<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\BasicController;
use App\Http\Resources\Game\GameResource;
use App\Models\Game;
use Illuminate\Http\Response;

class GetGameController extends BasicController
{
    /**
     * Retrieve game.
     *
     * @param Game $game
     * @return Response
     */
    public function __invoke(Game $game): Response
    {
        $game->load([
            'gameGeneration',
        ]);

        return $this->responseBuilder
            ->setMessage(trans('endpoints.game.get_game.ok'))
            ->setResource('game', GameResource::make($game))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
