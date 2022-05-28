<?php

namespace App\Http\Controllers\Role;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Resources\Role\RoleResource;
use App\Services\Role\GetRolesService;
use Illuminate\Http\Response;

class GetRolesController extends BasicController
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
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        GetRolesService $getRolesService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
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

        return $this->responseBuilder
            ->setMessage(trans('endpoints.role.get_roles.ok'))
            ->setResources('roles', RoleResource::collection($roles))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
