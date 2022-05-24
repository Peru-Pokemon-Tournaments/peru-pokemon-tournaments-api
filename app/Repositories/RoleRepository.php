<?php

namespace App\Repositories;

use App\Contracts\Repositories\RoleRepository as RoleRepositoryContract;
use App\Models\Role;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class RoleRepository implements RoleRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<Role>|Role[]
     */
    public function getAll(): Collection
    {
        return Role::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return Role
     */
    public function findOne(string &$id): Role
    {
        return Role::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<Role>|Role[]
     */
    public function findMany(array $ids): Collection
    {
        return Role::findMany($ids);
    }

    /**
     * Find super admin role.
     *
     * @return Role
     */
    public function getSuperAdminRole(): Role
    {
        return Role::superAdminRole();
    }

    /**
     * Find competitor role.
     *
     * @return Role
     */
    public function getCompetitorRole(): Role
    {
        return Role::competitorRole();
    }
}
