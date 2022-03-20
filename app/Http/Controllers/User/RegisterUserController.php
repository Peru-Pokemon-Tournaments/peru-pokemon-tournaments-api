<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Services\User\CreateCompleteUserService;

class RegisterUserController extends Controller
{
    /**
     * Create complete user service
     *
     * @var App\Services\User\CreateCompleteUserService
     */
    private CreateCompleteUserService $createCompleteUserService;

    /**
     * Create a new instance of RegisterUserController
     *
     * @return void
     */
    public function __construct(
        CreateCompleteUserService $createCompleteUserService
    )
    {
        $this->createCompleteUserService = $createCompleteUserService;
    }

    /**
     * Create a new complete user
     *
     * @param App\Http\Requests\RegisterUserRequest $request
     * @return App\Http\Resources\UserResource
     */
    public function __invoke(RegisterUserRequest $request)
    {
        $user = ($this->createCompleteUserService)($request->input());

        return new UserResource($user);
    }
}
