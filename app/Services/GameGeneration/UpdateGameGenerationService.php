<?php

namespace App\Services\GameGeneration;

use App\Contracts\Repositories\GameGenerationRepository;
use App\Models\GameGeneration;
use Illuminate\Database\Eloquent\Model;

class UpdateGameGenerationService
{
    /**
     * The game generation repository.
     *
     * @var GameGenerationRepository
     */
    private GameGenerationRepository $gameGenerationRepository;

    /**
     * Create a new UpdateGameGenerationService instance.
     *
     * @param GameGenerationRepository $gameGenerationRepository
     */
    public function __construct(GameGenerationRepository $gameGenerationRepository)
    {
        $this->gameGenerationRepository = $gameGenerationRepository;
    }

    /**
     * Update a game generation.
     *
     * @param string|GameGeneration $gameGeneration
     * @param array $attributes
     * @return GameGeneration|Model
     */
    public function __invoke($gameGeneration, array $attributes): GameGeneration
    {
        $gameGenerationId = $gameGeneration;

        if ($gameGeneration instanceof GameGeneration) {
            $gameGenerationId = $gameGeneration->id;
        }

        $this->gameGenerationRepository->update($gameGenerationId, $attributes);

        return $this->gameGenerationRepository->findOne($gameGenerationId);
    }
}
