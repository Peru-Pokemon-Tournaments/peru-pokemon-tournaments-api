<?php

namespace App\Repositories;

use App\Contracts\Repositories\ExternalBracketRepository as ExternalBracketRepositoryContract;
use App\Models\ExternalBracket;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class ExternalBracketRepository implements ExternalBracketRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<ExternalBracket>|ExternalBracket[]
     */
    public function getAll(): Collection
    {
        return ExternalBracket::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return ExternalBracket
     */
    public function findOne(string &$id): ExternalBracket
    {
        return ExternalBracket::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<ExternalBracket>|ExternalBracket[]
     */
    public function findMany(array $ids): Collection
    {
        return ExternalBracket::findMany($ids);
    }
}
