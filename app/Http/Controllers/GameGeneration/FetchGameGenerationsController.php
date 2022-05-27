<?php

namespace App\Http\Controllers\GameGeneration;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameGeneration\FetchGameGenerationsRequest;
use App\Http\Resources\GameGeneration\GameGenerationResource;
use App\Services\GameGeneration\FetchGameGenerationsService;
use Illuminate\Http\Response;

class FetchGameGenerationsController extends Controller
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
     */
    public function __construct(FetchGameGenerationsService $fetchGameGenerationsService)
    {
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

        return response(
            [
                'message' => 'Generaciones de Juegos encontrados',
                'game_generations' => GameGenerationResource::collection($gameGenerationsPaginated),
                'total' => $gameGenerationsPaginated->total(),
                'per_page' => $gameGenerationsPaginated->perPage(),
                'current_page' => $gameGenerationsPaginated->currentPage(),
                'last_page' => $gameGenerationsPaginated->lastPage(),
                'total_pages' => ceil($gameGenerationsPaginated->total() / $gameGenerationsPaginated->perPage()),
            ],
            Response::HTTP_OK
        );
    }
}
