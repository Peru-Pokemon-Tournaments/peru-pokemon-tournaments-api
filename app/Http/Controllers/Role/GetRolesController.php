<?php

namespace App\Http\Controllers\Role;

use App\Http\Resources\Role\RoleResource;
use App\Services\Role\GetRolesService;
use Illuminate\Http\Response;

class GetRolesController
{
    /**
     * The get roles service.
     *
     * @var GetRolesService
     */
    private GetRolesService $getRolesService;

    /**
     * Create a new GetRolesController instance.
     *
     * @param GetRolesService $getRolesService
     */
    public function __construct(GetRolesService $getRolesService)
    {
        $this->getRolesService = $getRolesService;
    }

    /**
     * Retrieve all roles.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        $roles = ($this->getRolesService)();

        return response(
            [
                'message' => 'Roles encontrados',
                'roles' => RoleResource::collection($roles),
            ],
            Response::HTTP_OK
        );
    }
}
