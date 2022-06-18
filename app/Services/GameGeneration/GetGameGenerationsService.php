<?php

namespace App\Services\GameGeneration;

use App\Contracts\Repositories\GameGenerationRepository;
use App\Models\GameGeneration;
use Illuminate\Support\Collection;

class GetGameGenerationsService
{
    /**
     * The game generation repository.
     *
     * @var GameGenerationRepository
     */
    private GameGenerationRepository $gameGenerationRepository;

    /**
     * Create a new GetGameGenerationGenerationsService instance.
     *
     * @param GameGenerationRepository $gameGenerationRepository
     */
    public function __construct(GameGenerationRepository $gameGenerationRepository)
    {
        $this->gameGenerationRepository = $gameGenerationRepository;
    }

    /**
     * Retrieves all game generations.
     *
     * @return Collection|GameGeneration[]
     */
    public function __invoke(): Collection
    {
        return $this->gameGenerationRepository->getAll();
    }
}
