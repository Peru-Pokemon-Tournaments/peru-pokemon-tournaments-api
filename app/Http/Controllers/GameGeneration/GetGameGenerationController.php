<?php

namespace App\Http\Controllers\GameGeneration;

use App\Http\Controllers\BasicController;
use App\Http\Resources\GameGeneration\GameGenerationResource;
use App\Models\GameGeneration;
use Illuminate\Http\Response;

class GetGameGenerationController extends BasicController
{
    /**
     * Retrieve game generation.
     *
     * @param GameGeneration $gameGeneration
     * @return Response
     */
    public function __invoke(GameGeneration $gameGeneration): Response
    {
        return $this->responseBuilder
            ->setMessage(trans('endpoints.game_generation.get_game_generation.ok'))
            ->setResource('game_generation', GameGenerationResource::make($gameGeneration))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
