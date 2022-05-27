<?php

namespace App\Http\Controllers\User;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Http\Controllers\PaginatedController;
use App\Http\Requests\User\FetchUsersRequest;
use App\Http\Resources\User\UserResource;
use App\Services\User\FetchUsersService;
use Illuminate\Http\Response;

class FetchUsersController extends PaginatedController
{
    /**
     * The FetchUsersService.
     *
     * @var FetchUsersService
     */
    private FetchUsersService $getUsersService;

    /**
     * Creates a new FetchUsersController instance.
     *
     * @param FetchUsersService $getUsersService
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        FetchUsersService $getUsersService,
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        parent::__construct($paginatedResponseBuilder);
        $this->getUsersService = $getUsersService;
    }

    /**
     * Retrieve all users paginated.
     *
     * @param FetchUsersRequest $request
     * @return Response
     */
    public function __invoke(FetchUsersRequest $request): Response
    {
        $usersPaginated = ($this->getUsersService)(
            $request->query('page', 1),
            $request->query('pageSize', 15)
        );

        return $this->paginatedResponseBuilder
            ->setMessage('Usuarios encontrados')
            ->setResources('users', UserResource::collection($usersPaginated))
            ->setLengthAwarePaginator($usersPaginated)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
