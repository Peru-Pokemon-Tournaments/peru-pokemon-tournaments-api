<?php

namespace App\Contracts\Repositories;

interface RoleRepository extends Repository
{
    /**
     * Find super admin role
     *
     * @return \App\Models\Role
     */
    public function getSuperAdminRole();

    /**
     * Find competitor role
     *
     * @return \App\Models\Role
     */
    public function getCompetitorRole();
}
