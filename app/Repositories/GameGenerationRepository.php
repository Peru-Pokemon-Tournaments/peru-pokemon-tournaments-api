<?php

namespace App\Repositories;

use App\Contracts\Repositories\GameGenerationRepository as GameGenerationRepositoryContract;
use App\Models\GameGeneration;
use App\Traits\Repositories\CommonMethods;

final class GameGenerationRepository implements GameGenerationRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return GameGeneration::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return GameGeneration::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return GameGeneration::findMany($ids);
    }
}
