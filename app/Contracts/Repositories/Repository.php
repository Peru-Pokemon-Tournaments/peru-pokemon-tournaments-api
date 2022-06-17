<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface Repository
{
    /**
     * Save the model.
     *
     * @param Model $model
     * @return bool
     */
    public function save(Model &$model): bool;

    /**
     * Update the model.
     *
     * @param string $id
     * @param array $attributes
     * @return bool
     */
    public function update(string &$id, array &$attributes): bool;

    /**
     * Delete the model.
     *
     * @param string $id
     * @return bool
     */
    public function delete(string &$id): bool;

    /**
     * Retrieves all models.
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return Model|null
     */
    public function findOne(string &$id): ?Model;

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection
     */
    public function findMany(array $ids): Collection;
}
