<?php

namespace App\Services\Game;

use App\Contracts\Repositories\GameRepository;
use App\Models\Game;

class CreateGameService
{
    /**
     * The game repository.
     *
     * @var GameRepository
     */
    private GameRepository $gameRepository;

    /**
     * Create a new CreateGameService instance.
     *
     * @param GameRepository $gameRepository
     */
    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    /**
     * Create a new game.
     *
     * @param array $attributes
     * @return Game
     */
    public function __invoke(array $attributes): Game
    {
        $game = new Game($attributes);

        $this->gameRepository->save($game);

        return $game;
    }
}
