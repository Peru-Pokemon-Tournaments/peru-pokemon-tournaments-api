<?php

namespace App\Repositories;

use App\Contracts\Repositories\PokemonShowdownTeamRepository as PokemonShowdownTeamRepositoryContract;
use App\Models\PokemonShowdownTeam;
use App\Traits\Repositories\CommonMethods;

final class PokemonShowdownTeamRepository implements PokemonShowdownTeamRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return PokemonShowdownTeam::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return PokemonShowdownTeam::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return PokemonShowdownTeam::findMany($ids);
    }
}
