<?php

namespace App\Services\Role;

use App\Contracts\Repositories\RoleRepository;
use App\Models\Role;

class CreateRoleService
{
    /**
     * The role repository.
     *
     * @var RoleRepository
     */
    private RoleRepository $roleRepository;

    /**
     * Create a new CreateRoleService instance.
     *
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Create a new role.
     *
     * @param string $name
     * @return Role
     */
    public function __invoke(string $name): Role
    {
        $role = new Role();
        $role->name = $name;

        $this->roleRepository->save($role);

        return $role;
    }
}
