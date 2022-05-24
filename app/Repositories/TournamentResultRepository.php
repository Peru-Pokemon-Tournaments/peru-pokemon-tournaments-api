<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentResultRepository as TournamentResultRepositoryContract;
use App\Models\TournamentResult;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class TournamentResultRepository implements TournamentResultRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<TournamentResult>|TournamentResult[]
     */
    public function getAll(): Collection
    {
        return TournamentResult::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return TournamentResult
     */
    public function findOne(string &$id): TournamentResult
    {
        return TournamentResult::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<TournamentResult>|TournamentResult[]
     */
    public function findMany(array $ids): Collection
    {
        return self::findMany($ids);
    }
}
