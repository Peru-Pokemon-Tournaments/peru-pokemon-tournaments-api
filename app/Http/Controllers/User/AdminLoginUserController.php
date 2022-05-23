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
     * Login user service
     *
     * @var App\Services\User\LoginUserService
     */
    private LoginUserService $loginUserService;

    /**
     * GetUserByEmail service
     *
     * @var App\Services\User\GetUserByEmail
     */
    private GetUserByEmailService $getUserByEmailService;

    /**
     * Create a new instance of LoginUserController
     *
     * @return void
     */
    public function __construct(
        LoginUserService $loginUserService,
        GetUserByEmailService $getUserByEmailService
    )
    {
        $this->loginUserService = $loginUserService;
        $this->getUserByEmailService = $getUserByEmailService;
    }

    /**
     * Login user
     *
     * @param App\Http\Requests\RegisterUserRequest $request
     * @return App\Http\Resources\UserResource
     */
    public function __invoke(LoginUserRequest $request)
    {
        $tokenOrFalse = ($this->loginUserService)(
            $request->input('email'),
            $request->input('password'));

        $user = ($this->getUserByEmailService)($request->input('email'));

        if (!$tokenOrFalse || !$user->hasRole('super admin'))
        {
            return response()->json(
                FailedAuthResource::make($request),
                Response::HTTP_UNAUTHORIZED
            );
        }

        return response(
            SuccessAuthResource::make([
                'token' => $tokenOrFalse,
                'user' => $user,
            ]),
            Response::HTTP_OK
        );
    }

}
