<?php

namespace App\Http\Controllers\GameGeneration;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\GameGeneration\UpdateGameGenerationRequest;
use App\Http\Resources\GameGeneration\GameGenerationResource;
use App\Models\GameGeneration;
use App\Services\GameGeneration\UpdateGameGenerationService;
use Illuminate\Http\Response;

class UpdateGameGenerationController extends BasicController
{
    /**
     * The UpdateGameGenerationService.
     *
     * @var UpdateGameGenerationService
     */
    private UpdateGameGenerationService $updateGameGenerationService;

    /**
     * Create a new UpdateGameGenerationController instance.
     *
     * @param UpdateGameGenerationService $updateGameGenerationService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        UpdateGameGenerationService $updateGameGenerationService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->updateGameGenerationService = $updateGameGenerationService;
    }

    /**
     * Update game generation.
     *
     * @param GameGeneration $gameGeneration
     * @param UpdateGameGenerationRequest $request
     * @return Response
     */
    public function __invoke(GameGeneration $gameGeneration, UpdateGameGenerationRequest $request): Response
    {
        $gameGeneration = ($this->updateGameGenerationService)(
            $gameGeneration,
            $request->validated()
        );

        return $this->responseBuilder
            ->setMessage(trans('endpoints.game_generation.update_game_generation.ok'))
            ->setResource('game_generation', GameGenerationResource::make($gameGeneration))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
