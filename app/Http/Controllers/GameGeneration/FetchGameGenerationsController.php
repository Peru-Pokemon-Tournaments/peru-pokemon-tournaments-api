<?php

namespace App\Http\Controllers\GameGeneration;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Http\Controllers\PaginatedController;
use App\Http\Requests\GameGeneration\FetchGameGenerationsRequest;
use App\Http\Resources\GameGeneration\GameGenerationResource;
use App\Services\GameGeneration\FetchGameGenerationsService;
use Illuminate\Http\Response;

class FetchGameGenerationsController extends PaginatedController
{
    /**
     * The fetch game generations service.
     *
     * @var FetchGameGenerationsService
     */
    private FetchGameGenerationsService $fetchGameGenerationsService;

    /**
     * Creates a new FetchGameGenerationsController instance.
     *
     * @param FetchGameGenerationsService $fetchGameGenerationsService
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        FetchGameGenerationsService $fetchGameGenerationsService,
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        parent::__construct($paginatedResponseBuilder);
        $this->fetchGameGenerationsService = $fetchGameGenerationsService;
    }

    /**
     * Retrieve all game generations paginated.
     *
     * @param FetchGameGenerationsRequest $request
     * @return Response
     */
    public function __invoke(FetchGameGenerationsRequest $request): Response
    {
        $gameGenerationsPaginated = ($this->fetchGameGenerationsService)(
            $request->query('page', 1),
            $request->query('pageSize', 15)
        );

        return $this->paginatedResponseBuilder
            ->setMessage('Generaciones de Juegos encontrados')
            ->setResources('game_generations', GameGenerationResource::collection($gameGenerationsPaginated))
            ->setLengthAwarePaginator($gameGenerationsPaginated)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
