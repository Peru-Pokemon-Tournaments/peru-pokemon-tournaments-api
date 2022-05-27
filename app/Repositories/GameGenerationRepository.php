<?php

namespace App\Repositories;

use App\Contracts\Repositories\GameGenerationRepository as GameGenerationRepositoryContract;
use App\Models\GameGeneration;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

final class GameGenerationRepository implements GameGenerationRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<GameGeneration>|GameGeneration[]
     */
    public function getAll(): Collection
    {
        return GameGeneration::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return GameGeneration
     */
    public function findOne(string &$id): GameGeneration
    {
        return GameGeneration::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<GameGeneration>|GameGeneration[]
     */
    public function findMany(array $ids): Collection
    {
        return GameGeneration::findMany($ids);
    }

    /**
     * Retrieve all game generations paginated.
     *
     * @param int $page
     * @param int|null $pageSize
     * @return LengthAwarePaginator
     */
    public function getPaginated(int $page = 1, ?int $pageSize = null): LengthAwarePaginator
    {
        return GameGeneration::paginate($pageSize, ['*'], 'page', $page);
    }
}
