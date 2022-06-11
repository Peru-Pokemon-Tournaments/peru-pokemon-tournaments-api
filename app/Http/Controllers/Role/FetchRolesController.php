<?php

namespace App\Http\Controllers\Role;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Http\Controllers\PaginatedController;
use App\Http\Requests\Role\FetchRolesRequest;
use App\Http\Resources\Role\RoleResource;
use App\Services\Role\FetchRolesService;
use Illuminate\Http\Response;

class FetchRolesController extends PaginatedController
{
    /**
     * The fetch roles service.
     *
     * @var FetchRolesService
     */
    private FetchRolesService $fetchRolesService;

    /**
     * Creates a new FetchRolesController instance.
     *
     * @param FetchRolesService $fetchRolesService
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        FetchRolesService $fetchRolesService,
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        parent::__construct($paginatedResponseBuilder);
        $this->fetchRolesService = $fetchRolesService;
    }

    /**
     * Retrieve all roles paginated.
     *
     * @param FetchRolesRequest $request
     * @return Response
     */
    public function __invoke(FetchRolesRequest $request): Response
    {
        $rolesPaginated = ($this->fetchRolesService)(
            $request->query('page', 1),
            $request->query('pageSize', 15)
        );

        return $this->paginatedResponseBuilder
            ->setMessage(trans('endpoints.role.fetch_roles.ok'))
            ->setResources('roles', RoleResource::collection($rolesPaginated))
            ->setLengthAwarePaginator($rolesPaginated)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
