<?php

namespace App\Repositories;

use App\Contracts\Repositories\GameRepository as GameRepositoryContract;
use App\Models\Game;
use App\Traits\Repositories\CommonMethods;

final class GameRepository implements GameRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Game::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return Game::find($id);
    }
}
