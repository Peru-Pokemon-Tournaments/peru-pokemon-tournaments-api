<?php

namespace App\Repositories;

use App\Contracts\Repositories\PokemonShowdownTeamRepository as PokemonShowdownTeamRepositoryContract;
use App\Models\PokemonShowdownTeam;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class PokemonShowdownTeamRepository implements PokemonShowdownTeamRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<PokemonShowdownTeam>|PokemonShowdownTeam[]
     */
    public function getAll(): Collection
    {
        return PokemonShowdownTeam::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return PokemonShowdownTeam
     */
    public function findOne(string &$id): PokemonShowdownTeam
    {
        return PokemonShowdownTeam::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<PokemonShowdownTeam>|PokemonShowdownTeam[]
     */
    public function findMany(array $ids): Collection
    {
        return PokemonShowdownTeam::findMany($ids);
    }
}
