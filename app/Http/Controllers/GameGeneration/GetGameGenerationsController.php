<?php

namespace App\Http\Controllers\GameGeneration;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Resources\GameGeneration\GameGenerationResource;
use App\Services\GameGeneration\GetGameGenerationsService;
use Illuminate\Http\Response;

class GetGameGenerationsController extends BasicController
{
    /**
     * The GetGameGenerationsService service.
     *
     * @var GetGameGenerationsService
     */
    private GetGameGenerationsService $getGameGenerationsService;

    /**
     * Create a new GetGameGenerationGenerationsController instance.
     *
     * @param GetGameGenerationsService $getGameGenerationsService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        GetGameGenerationsService $getGameGenerationsService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->getGameGenerationsService = $getGameGenerationsService;
    }

    /**
     * Retrieve all game generations.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        $gameGenerations = ($this->getGameGenerationsService)();

        return $this->responseBuilder
            ->setMessage(trans('endpoints.game_generation.get_game_generations.ok'))
            ->setResources('game_generations', GameGenerationResource::collection($gameGenerations))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
