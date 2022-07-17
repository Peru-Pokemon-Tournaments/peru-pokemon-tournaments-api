<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentResultRepository as TournamentResultRepositoryContract;
use App\Models\TournamentResult;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

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
        return TournamentResult::findMany($ids);
    }

    /**
     * Retrieve tournament results paginated and filtered.
     *
     * @param int $page
     * @param int|null $pageSize
     * @param array $filters
     * @return LengthAwarePaginator
     */
    public function getPaginatedFiltered(
        int $page = 1,
        ?int $pageSize = null,
        array $filters = []
    ): LengthAwarePaginator {
        $builder = TournamentResult::query();

        if (Arr::has($filters, 'tournament.id')) {
            $builder->filterByTournament(Arr::get($filters, 'tournament.id'));
        }

        return $builder->paginate($pageSize, ['*'], 'page', $page);
    }
}
