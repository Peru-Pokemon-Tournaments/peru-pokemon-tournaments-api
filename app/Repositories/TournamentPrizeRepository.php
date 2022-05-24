<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentPrizeRepository as TournamentPrizeRepositoryContract;
use App\Models\TournamentPrize;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class TournamentPrizeRepository implements TournamentPrizeRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<TournamentPrize>|TournamentPrize[]
     */
    public function getAll(): Collection
    {
        return TournamentPrize::all();
    }

    /**
     * Find one model by id.
     *
     * @return TournamentPrize
     */
    public function findOne(string &$id): TournamentPrize
    {
        return TournamentPrize::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<TournamentPrize>|TournamentPrize[]
     */
    public function findMany(array $ids): Collection
    {
        return TournamentPrize::findMany($ids);
    }
}
