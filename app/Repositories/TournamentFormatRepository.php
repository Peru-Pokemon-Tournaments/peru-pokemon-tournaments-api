<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentFormatRepository as TournamentFormatRepositoryContract;
use App\Models\TournamentFormat;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class TournamentFormatRepository implements TournamentFormatRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<TournamentFormat>|TournamentFormat[]
     */
    public function getAll(): Collection
    {
        return TournamentFormat::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return TournamentFormat
     */
    public function findOne(string &$id): TournamentFormat
    {
        return TournamentFormat::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<TournamentFormat>|TournamentFormat[]
     */
    public function findMany(array $ids): Collection
    {
        return TournamentFormat::findMany($ids);
    }
}
