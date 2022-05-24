<?php

namespace App\Contracts\Repositories;

use App\Models\Role;

interface RoleRepository extends Repository
{
    /**
     * Find super admin role.
     *
     * @return Role
     */
    public function getSuperAdminRole(): Role;

    /**
     * Find competitor role.
     *
     * @return Role
     */
    public function getCompetitorRole(): Role;
}
