<?php

namespace App\Services\GameGeneration;

use App\Contracts\Repositories\GameGenerationRepository;
use App\Models\GameGeneration;

class CreateGameGenerationService
{
    /**
     * The game generation repository.
     *
     * @var GameGenerationRepository
     */
    private GameGenerationRepository $gameGenerationRepository;

    /**
     * Create a new CreateGameGenerationService instance.
     *
     * @param GameGenerationRepository $gameGenerationRepository
     */
    public function __construct(GameGenerationRepository $gameGenerationRepository)
    {
        $this->gameGenerationRepository = $gameGenerationRepository;
    }

    /**
     * Create a new game generation.
     *
     * @param array $attributes
     * @return GameGeneration
     */
    public function __invoke(array $attributes): GameGeneration
    {
        $gameGeneration = new GameGeneration($attributes);

        $this->gameGenerationRepository->save($gameGeneration);

        return $gameGeneration;
    }
}
