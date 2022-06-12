<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentTypeRepository as TournamentTypeRepositoryContract;
use App\Models\TournamentType;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

final class TournamentTypeRepository implements TournamentTypeRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<TournamentType>|TournamentType[]
     */
    public function getAll(): Collection
    {
        return TournamentType::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return TournamentType
     */
    public function findOne(string &$id): TournamentType
    {
        return TournamentType::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<TournamentType>|TournamentType[]
     */
    public function findMany(array $ids): Collection
    {
        return TournamentType::findMany($ids);
    }

    /**
     * Retrieve all tournament types paginated.
     *
     * @param int $page
     * @param int|null $pageSize
     * @return LengthAwarePaginator
     */
    public function getPaginated(int $page = 1, ?int $pageSize = null): LengthAwarePaginator
    {
        return TournamentType::paginate($pageSize, ['*'], 'page', $page);
    }
}
