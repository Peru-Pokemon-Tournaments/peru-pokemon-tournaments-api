<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepository as UserRepositoryContract;
use App\Models\User;
use App\Traits\Repositories\CommonMethods;

final class UserRepository implements UserRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return User::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return User::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return User::findMany($ids);
    }

    /**
     * Find one user by email
     *
     * @param  string $email
     * @param  string $relationships
     * @return \App\Models\User
     */
    public function findOneByEmail(string &$email, array $relationships = [])
    {
        return User::with($relationships)->where('email', '=', $email)->first();
    }
}
