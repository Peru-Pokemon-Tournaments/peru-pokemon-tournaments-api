<?php

namespace App\Services\GameGeneration;

use App\Contracts\Repositories\GameGenerationRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FetchGameGenerationsService
{
    /**
     * The game generation repository.
     *
     * @var GameGenerationRepository
     */
    private GameGenerationRepository $gameGenerationRepository;

    /**
     * Create a new FetchGameGenerationsService instance.
     *
     * @param GameGenerationRepository $gameGenerationRepository
     */
    public function __construct(GameGenerationRepository $gameGenerationRepository)
    {
        $this->gameGenerationRepository = $gameGenerationRepository;
    }

    /**
     * Retrieve all game generations paginated.
     *
     * @param int $page
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function __invoke(int $page, int $pageSize): LengthAwarePaginator
    {
        return $this->gameGenerationRepository->getPaginated($page, $pageSize);
    }
}
