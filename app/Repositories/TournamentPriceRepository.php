<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentPriceRepository as TournamentPriceRepositoryContract;
use App\Models\TournamentPrice;
use App\Traits\Repositories\CommonMethods;

final class TournamentPriceRepository implements TournamentPriceRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return TournamentPrice::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return TournamentPrice::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return TournamentPrice::findMany($ids);
    }
}
