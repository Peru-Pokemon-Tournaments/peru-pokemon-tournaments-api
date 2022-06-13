<?php

namespace App\Http\Controllers\Role;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Resources\Role\RoleResource;
use App\Services\Role\CreateRoleService;
use Illuminate\Http\Response;

class CreateRoleController extends BasicController
{
    /**
     * The CreateRoleService.
     *
     * @var CreateRoleService
     */
    private CreateRoleService $createRoleService;

    /**
     * Create a new CreateRoleController instance.
     *
     * @param CreateRoleService $createRoleService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreateRoleService $createRoleService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->createRoleService = $createRoleService;
    }

    /**
     * Create role.
     *
     * @param CreateRoleRequest $request
     * @return Response
     */
    public function __invoke(CreateRoleRequest $request): Response
    {
        $role = ($this->createRoleService)($request->input('name'));

        return $this->responseBuilder
            ->setMessage(trans('endpoints.role.create_role.created'))
            ->setResource('role', RoleResource::make($role))
            ->setStatusCode(Response::HTTP_CREATED)
            ->get();
    }
}
