<?php

namespace App\Repositories;

use App\Contracts\Repositories\GameRepository as GameRepositoryContract;
use App\Models\Game;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

final class GameRepository implements GameRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<Game>|Game[]
     */
    public function getAll(): Collection
    {
        return Game::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return Game
     */
    public function findOne(string &$id): Game
    {
        return Game::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<Game>|Game[]
     */
    public function findMany(array $ids): Collection
    {
        return Game::findMany($ids);
    }

    /**
     * Retrieve all games paginated.
     *
     * @param int $page
     * @param int|null $pageSize
     * @return LengthAwarePaginator
     */
    public function getPaginated(int $page = 1, ?int $pageSize = null): LengthAwarePaginator
    {
        return Game::with(['gameGeneration'])->paginate($pageSize, ['*'], 'page', $page);
    }
}
