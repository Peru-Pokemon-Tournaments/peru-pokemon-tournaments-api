<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentTypeRepository as TournamentTypeRepositoryContract;
use App\Models\TournamentType;
use App\Traits\Repositories\CommonMethods;

final class TournamentTypeRepository implements TournamentTypeRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return TournamentType::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return TournamentType::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return TournamentType::findMany($ids);
    }
}
