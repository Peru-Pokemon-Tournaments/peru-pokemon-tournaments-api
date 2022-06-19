<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\BasicController;
use App\Http\Resources\Role\RoleResource;
use App\Models\Role;
use Illuminate\Http\Response;

class GetRoleController extends BasicController
{
    /**
     * Retrieve role.
     *
     * @param Role $role
     * @return Response
     */
    public function __invoke(Role $role): Response
    {
        return $this->responseBuilder
            ->setMessage(trans('endpoints.role.get_role.ok'))
            ->setResource('role', RoleResource::make($role))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
