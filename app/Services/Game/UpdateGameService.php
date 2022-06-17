<?php

namespace App\Services\Game;

use App\Contracts\Repositories\GameRepository;
use App\Models\Game;
use Illuminate\Database\Eloquent\Model;

class UpdateGameService
{
    /**
     * The game repository.
     *
     * @var GameRepository
     */
    private GameRepository $gameRepository;

    /**
     * Create a new UpdateGameService instance.
     *
     * @param GameRepository $gameRepository
     */
    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    /**
     * Update a game.
     *
     * @param Game|string $game
     * @param array $attributes
     * @return Game|Model
     */
    public function __invoke($game, array $attributes): Game
    {
        $gameId = $game;

        if ($game instanceof Game) {
            $gameId = $game->id;
        }

        $this->gameRepository->update($gameId, $attributes);

        return $this->gameRepository->findOne($gameId);
    }
}
