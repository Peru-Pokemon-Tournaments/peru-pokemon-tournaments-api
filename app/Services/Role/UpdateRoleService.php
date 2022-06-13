<?php

namespace App\Services\Role;

use App\Contracts\Repositories\RoleRepository;
use App\Models\Role;
use Illuminate\Support\Arr;

class UpdateRoleService
{
    /**
     * The role repository.
     *
     * @var RoleRepository
     */
    private RoleRepository $roleRepository;

    /**
     * Create a new UpdateRoleService instance.
     *
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Updates a role.
     *
     * @param string|Role $role
     * @param array $attributes
     * @return Role
     */
    public function __invoke($role, array $attributes): Role
    {
        if (gettype($role) == 'string') {
            if ($foundRole = $this->roleRepository->findOne($role)) {
                $role = $foundRole;
            }
        }

        $role->name = Arr::get($attributes, 'name');

        $this->roleRepository->save($role);

        return $role;
    }
}
