<?php

namespace App\Repositories;

use App\Contracts\Repositories\GameGenerationRepository as GameGenerationRepositoryContract;
use App\Models\GameGeneration;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class GameGenerationRepository implements GameGenerationRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<GameGeneration>|GameGeneration[]
     */
    public function getAll(): Collection
    {
        return GameGeneration::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return GameGeneration
     */
    public function findOne(string &$id): GameGeneration
    {
        return GameGeneration::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<GameGeneration>|GameGeneration[]
     */
    public function findMany(array $ids): Collection
    {
        return GameGeneration::findMany($ids);
    }
}
