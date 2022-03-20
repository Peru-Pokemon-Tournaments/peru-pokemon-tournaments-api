<?php

namespace App\Repositories;

use App\Contracts\Repositories\CompetitorRepository as CompetitorRepositoryContract;
use App\Models\Competitor;
use App\Traits\Repositories\CommonMethods;

final class CompetitorRepository implements CompetitorRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Competitor::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return Competitor::find($id);
    }
}
