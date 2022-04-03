<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentResultRepository as TournamentResultRepositoryContract;
use App\Models\TournamentResult;
use App\Traits\Repositories\CommonMethods;

final class TournamentResultRepository implements TournamentResultRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return TournamentResult::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return TournamentResult::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return TournamentResultRepository::findMany($ids);
    }
}
