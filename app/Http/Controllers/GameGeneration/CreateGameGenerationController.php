<?php

namespace App\Http\Controllers\GameGeneration;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\GameGeneration\CreateGameGenerationRequest;
use App\Http\Resources\GameGeneration\GameGenerationResource;
use App\Services\GameGeneration\CreateGameGenerationService;
use Illuminate\Http\Response;

class CreateGameGenerationController extends BasicController
{
    /**
     * The CreateGameGenerationService.
     *
     * @var CreateGameGenerationService
     */
    private CreateGameGenerationService $createGameGenerationService;

    /**
     * Create a new CreateGameGenerationController instance.
     *
     * @param CreateGameGenerationService $createGameGenerationService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreateGameGenerationService $createGameGenerationService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->createGameGenerationService = $createGameGenerationService;
    }

    /**
     * Create game generation.
     *
     * @param CreateGameGenerationRequest $request
     * @return Response
     */
    public function __invoke(CreateGameGenerationRequest $request): Response
    {
        $gameGeneration = ($this->createGameGenerationService)($request->validated());

        return $this->responseBuilder
            ->setMessage(trans('endpoints.game_generation.create_game_generation.created'))
            ->setResource('game_generation', GameGenerationResource::make($gameGeneration))
            ->setStatusCode(Response::HTTP_CREATED)
            ->get();
    }
}
