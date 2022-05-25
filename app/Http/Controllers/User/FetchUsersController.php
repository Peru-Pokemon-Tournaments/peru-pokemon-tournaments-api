<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\FetchUsersRequest;
use App\Http\Resources\User\UserResource;
use App\Services\User\FetchUsersService;
use Illuminate\Http\Response;

class FetchUsersController extends Controller
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
     */
    public function __construct(FetchUsersService $getUsersService)
    {
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

        return response(
            [
                'message' => 'Usuarios encontrados',
                'users' => UserResource::collection($usersPaginated),
                'total' => $usersPaginated->total(),
                'per_page' => $usersPaginated->perPage(),
                'current_page' => $usersPaginated->currentPage(),
                'last_page' => $usersPaginated->lastPage(),
                'total_pages' => ceil($usersPaginated->total() / $usersPaginated->perPage()),
            ],
            Response::HTTP_OK
        );
    }
}
