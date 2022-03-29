<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\FailedAuthResource;
use App\Http\Resources\SuccessAuthResource;
use App\Services\User\GetUserByEmailService;
use App\Services\User\LoginUserService;

class LoginUserController extends Controller
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

        if (!$tokenOrFalse)
        {
            return new FailedAuthResource($request);
        }

        $user = ($this->getUserByEmailService)($request->input('email'));

        return new SuccessAuthResource([
            'token' => $tokenOrFalse,
            'user' => $user,
        ]);
    }
}
