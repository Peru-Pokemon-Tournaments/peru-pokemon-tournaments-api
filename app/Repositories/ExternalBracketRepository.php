<?php

namespace App\Repositories;

use App\Contracts\Repositories\ExternalBracketRepository as ExternalBracketRepositoryContract;
use App\Models\ExternalBracket;
use App\Traits\Repositories\CommonMethods;

final class ExternalBracketRepository implements ExternalBracketRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return ExternalBracket::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return ExternalBracket::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return ExternalBracket::findMany($ids);
    }
}
