<?php

namespace App\Repositories;

use App\Contracts\Repositories\RoleRepository as RoleRepositoryContract;
use App\Models\Role;
use App\Traits\Repositories\CommonMethods;

final class RoleRepository implements RoleRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Role::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return Role::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return Role::findMany($ids);
    }

    /**
     * Find super admin role
     *
     * @return \App\Models\Role
     */
    public function getSuperAdminRole()
    {
        return Role::superAdminRole();
    }

    /**
     * Find competitor role
     *
     * @return \App\Models\Role
     */
    public function getCompetitorRole()
    {
        return Role::competitorRole();
    }
}
