<?php

namespace App\Repositories;

use App\Contracts\Repositories\PersonRepository as PersonRepositoryContract;
use App\Models\Person;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class PersonRepository implements PersonRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<Person>|Person[]
     */
    public function getAll(): Collection
    {
        return Person::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return Person
     */
    public function findOne(string &$id): Person
    {
        return Person::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<Person>|Person[]
     */
    public function findMany(array $ids): Collection
    {
        return self::findMany($ids);
    }
}
