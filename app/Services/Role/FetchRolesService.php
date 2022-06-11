<?php

namespace App\Services\Role;

use App\Contracts\Repositories\RoleRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FetchRolesService
{
    /**
     * The role repository.
     *
     * @var RoleRepository
     */
    private RoleRepository $roleRepository;

    /**
     * Create a new FetchRolesService instance.
     *
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Retrieve all roles paginated.
     *
     * @param int $page
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function __invoke(int $page, int $pageSize): LengthAwarePaginator
    {
        return $this->roleRepository->getPaginated($page, $pageSize);
    }
}
