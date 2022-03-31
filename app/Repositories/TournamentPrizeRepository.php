<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentPrizeRepository as TournamentPrizeRepositoryContract;
use App\Models\TournamentPrize;
use App\Traits\Repositories\CommonMethods;

final class TournamentPrizeRepository implements TournamentPrizeRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return TournamentPrize::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return TournamentPrize::find($id);
    }
}
