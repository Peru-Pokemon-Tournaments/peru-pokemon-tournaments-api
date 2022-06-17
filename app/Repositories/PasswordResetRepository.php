<?php

namespace App\Repositories;

use App\Contracts\Repositories\PasswordResetRepository as PasswordResetRepositoryContract;
use App\Models\PasswordReset;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class PasswordResetRepository implements PasswordResetRepositoryContract
{
    /**
     * Save the model.
     *
     * @param PasswordReset $model
     * @return bool
     */
    public function save(Model &$model): bool
    {
        return $model->save();
    }

    /**
     * Update the model.
     *
     * @param string $id
     * @param array $attributes
     * @return bool
     */
    public function update(string &$id, array &$attributes): bool
    {
        return PasswordReset::where('user_id', $id)->update($attributes);
    }

    /**
     * Delete the model.
     *
     * @param string $id
     * @return bool
     */
    public function delete(string &$id): bool
    {
        $model = PasswordReset::where('user_id', $id)->first();

        if (!$model) {
            return false;
        }

        return $model->delete();
    }

    /**
     * Retrieves all models.
     *
     * @return Collection<PasswordReset>|PasswordReset[]
     */
    public function getAll(): Collection
    {
        return PasswordReset::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return PasswordReset|null
     */
    public function findOne(string &$id): ?PasswordReset
    {
        return PasswordReset::where('user_id', $id)->first();
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<PasswordReset>|PasswordReset[]
     */
    public function findMany(array $ids): Collection
    {
        return PasswordReset::whereIn('user_id', $ids)->get();
    }
}
