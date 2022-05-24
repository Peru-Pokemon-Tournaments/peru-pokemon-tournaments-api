<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentPriceRepository as TournamentPriceRepositoryContract;
use App\Models\TournamentPrice;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class TournamentPriceRepository implements TournamentPriceRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<TournamentPrice>|TournamentPrice[]
     */
    public function getAll(): Collection
    {
        return TournamentPrice::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return TournamentPrice
     */
    public function findOne(string &$id): TournamentPrice
    {
        return TournamentPrice::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<TournamentPrice>|TournamentPrice[]
     */
    public function findMany(array $ids): Collection
    {
        return TournamentPrice::findMany($ids);
    }
}
