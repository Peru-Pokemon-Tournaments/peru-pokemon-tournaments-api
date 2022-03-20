<?php

namespace App\Repositories;

use App\Contracts\Repositories\PersonRepository as PersonRepositoryContract;
use App\Models\Person;
use App\Traits\Repositories\CommonMethods;

final class PersonRepository implements PersonRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Person::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return Person::find($id);
    }
}
