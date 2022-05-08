<?php

namespace App\Repositories;

use App\Contracts\Repositories\PasswordResetRepository as PasswordResetRepositoryContract;
use App\Models\PasswordReset;
use Illuminate\Database\Eloquent\Model;

final class PasswordResetRepository implements PasswordResetRepositoryContract
{
    /**
     * Save the model
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return bool
     */
    public function save(Model &$model)
    {
        return $model->save();
    }

    /**
     * Update the model
     *
     * @param string $id
     * @param array $attributes
     * @return bool
     */
    public function update(string &$id, array &$attributes)
    {
        return PasswordReset::where('user_id', $id)->update($attributes);
    }

    /**
     * Delete the model
     *
     * @param string $id
     * @return bool
     */
    public function delete(string &$id)
    {
        $model = PasswordReset::where('user_id', $id)->first();

        if (!$model)
        {
            return false;
        }

        return $model->delete();
    }

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return PasswordReset::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return PasswordReset::where('user_id', $id)->first();
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return PasswordReset::whereIn('user_id', $ids)->get();
    }
}
