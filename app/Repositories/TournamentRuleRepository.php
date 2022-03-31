<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentRuleRepository as TournamentRuleRepositoryContract;
use App\Models\TournamentRule;
use App\Traits\Repositories\CommonMethods;

final class TournamentRuleRepository implements TournamentRuleRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return TournamentRule::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return TournamentRule::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return TournamentRule::findMany($ids);
    }
}
