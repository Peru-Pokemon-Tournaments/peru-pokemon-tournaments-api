<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentRepository as TournamentRepositoryContract;
use App\Models\Tournament;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class TournamentRepository implements TournamentRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<Tournament>|Tournament[]
     */
    public function getAll(): Collection
    {
        return Tournament::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return Tournament
     */
    public function findOne(string &$id): Tournament
    {
        return Tournament::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<Tournament>|Tournament[]
     */
    public function findMany(array $ids): Collection
    {
        return Tournament::findMany($ids);
    }
}
