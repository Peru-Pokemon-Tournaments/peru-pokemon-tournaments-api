<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentRuleRepository as TournamentRuleRepositoryContract;
use App\Models\TournamentRule;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

final class TournamentRuleRepository implements TournamentRuleRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<TournamentRule>|TournamentRule[]
     */
    public function getAll(): Collection
    {
        return TournamentRule::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return TournamentRule
     */
    public function findOne(string &$id): TournamentRule
    {
        return TournamentRule::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<TournamentRule>|TournamentRule[]
     */
    public function findMany(array $ids): Collection
    {
        return TournamentRule::findMany($ids);
    }

    /**
     * Retrieve all tournament rules paginated.
     *
     * @param int $page
     * @param int|null $pageSize
     * @return LengthAwarePaginator
     */
    public function getPaginated(int $page = 1, ?int $pageSize = null): LengthAwarePaginator
    {
        return TournamentRule::paginate($pageSize, ['*'], 'page', $page);
    }
}
