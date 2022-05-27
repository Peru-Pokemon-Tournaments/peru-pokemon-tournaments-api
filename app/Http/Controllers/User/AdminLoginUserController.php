<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\FailedAuthResource;
use App\Http\Resources\SuccessAuthResource;
use App\Services\User\GetUserByEmailService;
use App\Services\User\LoginUserService;
use Illuminate\Http\Response;

class AdminLoginUserController extends Controller
{
    /**
     * Login user service.
     *
     * @var LoginUserService
     */
    private LoginUserService $loginUserService;

    /**
     * GetUserByEmail service.
     *
     * @var GetUserByEmailService
     */
    private GetUserByEmailService $getUserByEmailService;

    /**
     * Create a new instance of LoginUserController.
     *
     * @param LoginUserService $loginUserService
     * @param GetUserByEmailService $getUserByEmailService
     */
    public function __construct(
        LoginUserService $loginUserService,
        GetUserByEmailService $getUserByEmailService
    ) {
        $this->loginUserService = $loginUserService;
        $this->getUserByEmailService = $getUserByEmailService;
    }

    /**
     * Admin login user.
     *
     * @param LoginUserRequest $request
     * @return Response
     */
    public function __invoke(LoginUserRequest $request): Response
    {
        $tokenOrFalse = ($this->loginUserService)(
            $request->input('email'),
            $request->input('password')
        );

        $user = ($this->getUserByEmailService)($request->input('email'));

        if (!$tokenOrFalse || !$user->hasRole('super admin')) {
            return response(
                FailedAuthResource::make($request),
                Response::HTTP_UNAUTHORIZED
            );
        }

        $user->load(['person', 'competitor']);

        return response(
            SuccessAuthResource::make([
                'token' => $tokenOrFalse,
                'user' => $user,
            ]),
            Response::HTTP_OK
        );
    }
}
