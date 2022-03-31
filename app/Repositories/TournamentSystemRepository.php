<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentSystemRepository as TournamentSystemRepositoryContract;
use App\Models\TournamentSystem;
use App\Traits\Repositories\CommonMethods;

final class TournamentSystemRepository implements TournamentSystemRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return TournamentSystem::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return TournamentSystem::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return TournamentSystem::findMany($ids);
    }
}
