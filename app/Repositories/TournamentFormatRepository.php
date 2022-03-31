<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentFormatRepository as TournamentFormatRepositoryContract;
use App\Models\TournamentFormat;
use App\Traits\Repositories\CommonMethods;

final class TournamentFormatRepository implements TournamentFormatRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return TournamentFormat::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return TournamentFormat::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return TournamentFormat::findMany($ids);
    }
}
