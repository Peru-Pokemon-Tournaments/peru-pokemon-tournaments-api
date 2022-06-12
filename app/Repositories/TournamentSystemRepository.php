<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentSystemRepository as TournamentSystemRepositoryContract;
use App\Models\TournamentSystem;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

final class TournamentSystemRepository implements TournamentSystemRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<TournamentSystem>|TournamentSystem[]
     */
    public function getAll(): Collection
    {
        return TournamentSystem::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return TournamentSystem
     */
    public function findOne(string &$id): TournamentSystem
    {
        return TournamentSystem::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<TournamentSystem>|TournamentSystem[]
     */
    public function findMany(array $ids): Collection
    {
        return TournamentSystem::findMany($ids);
    }

    /**
     * Retrieve all tournament systems paginated.
     *
     * @param int $page
     * @param int|null $pageSize
     * @return LengthAwarePaginator
     */
    public function getPaginated(int $page = 1, ?int $pageSize = null): LengthAwarePaginator
    {
        return TournamentSystem::paginate($pageSize, ['*'], 'page', $page);
    }
}
