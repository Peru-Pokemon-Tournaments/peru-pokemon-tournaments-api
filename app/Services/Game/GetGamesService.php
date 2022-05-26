<?php

namespace App\Services\Game;

use App\Contracts\Repositories\GameRepository;
use App\Models\Game;
use Illuminate\Support\Collection;

class GetGamesService
{
    /**
     * The role repository.
     *
     * @var GameRepository
     */
    private GameRepository $gameRepository;

    /**
     * Create a new GetRolesService instance.
     *
     * @param GameRepository $gameRepository
     */
    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    /**
     * Retrieves all roles.
     *
     * @return Collection|Game[]
     */
    public function __invoke(): Collection
    {
        return $this->gameRepository->getAll();
    }
}
