<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;

interface Repository
{
    /**
     * Save the model
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return bool
     */
    public function save(Model &$model);

    /**
     * Update the model
     *
     * @param string $id
     * @param array $attributes
     * @return bool
     */
    public function update(string &$id, array &$attributes);

    /**
     * Delete the model
     *
     * @param string $id
     * @return bool
     */
    public function delete(string &$id);

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id);
}
