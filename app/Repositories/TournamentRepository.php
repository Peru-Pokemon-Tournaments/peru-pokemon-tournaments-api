<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentRepository as TournamentRepositoryContract;
use App\Models\Tournament;
use App\Traits\Repositories\CommonMethods;

final class TournamentRepository implements TournamentRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Tournament::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return Tournament::find($id);
    }
}
