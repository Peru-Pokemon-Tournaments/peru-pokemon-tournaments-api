<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\FailedAuthResource;
use App\Http\Resources\SuccessAuthResource;
use App\Services\User\GetUserByEmailService;
use App\Services\User\LoginUserService;
use Illuminate\Http\Response;

class LoginUserController extends Controller
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
     * Login user.
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

        if (!$tokenOrFalse) {
            return response(
                FailedAuthResource::make($request),
                Response::HTTP_UNAUTHORIZED
            );
        }

        $user = ($this->getUserByEmailService)($request->input('email'));

        return response(
            SuccessAuthResource::make([
                'token' => $tokenOrFalse,
                'user' => $user,
            ]),
            Response::HTTP_OK
        );
    }
}
