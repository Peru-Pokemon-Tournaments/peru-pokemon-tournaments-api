<?php

namespace App\Http\Controllers\Role;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Http\Resources\Role\RoleResource;
use App\Models\Role;
use App\Services\Role\UpdateRoleService;
use Illuminate\Http\Response;

class UpdateRoleController extends BasicController
{
    /**
     * The UpdateRoleService.
     *
     * @var UpdateRoleService
     */
    private UpdateRoleService $updateRoleService;

    /**
     * Create a new CreateRoleController instance.
     *
     * @param UpdateRoleService $updateRoleService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        UpdateRoleService $updateRoleService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->updateRoleService = $updateRoleService;
    }

    /**
     * Create role.
     *
     * @param Role $role
     * @param UpdateRoleRequest $request
     * @return Response
     */
    public function __invoke(Role $role, UpdateRoleRequest $request): Response
    {
        $role = ($this->updateRoleService)(
            $role,
            $request->validated()
        );

        return $this->responseBuilder
            ->setMessage(trans('endpoints.role.update_role.ok'))
            ->setResource('role', RoleResource::make($role))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
