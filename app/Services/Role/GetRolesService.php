<?php

namespace App\Services\Role;

use App\Contracts\Repositories\RoleRepository;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class GetRolesService
{
    /**
     * The role repository.
     *
     * @var RoleRepository
     */
    private RoleRepository $roleRepository;

    /**
     * Create a new GetRolesService instance.
     *
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Retrieves all roles.
     *
     * @return Collection|Role[]
     */
    public function __invoke(): Collection
    {
        return $this->roleRepository->getAll();
    }
}
