<?php

namespace App\Services\Game;

use App\Contracts\Repositories\GameRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FetchGamesService
{
    /**
     * The game repository.
     *
     * @var GameRepository
     */
    private GameRepository $gameRepository;

    /**
     * Create a new FetchGamesService instance.
     *
     * @param GameRepository $gameRepository
     */
    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    /**
     * Retrieve all devices paginated.
     *
     * @param int $page
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function __invoke(int $page, int $pageSize): LengthAwarePaginator
    {
        return $this->gameRepository->getPaginated($page, $pageSize);
    }
}
