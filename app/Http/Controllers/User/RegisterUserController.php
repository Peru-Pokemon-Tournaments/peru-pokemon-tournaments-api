<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Services\User\CreateCompleteUserService;
use Illuminate\Http\Response;

class RegisterUserController extends Controller
{
    /**
     * Create complete user service.
     *
     * @var CreateCompleteUserService
     */
    private CreateCompleteUserService $createCompleteUserService;

    /**
     * Create a new instance of RegisterUserController.
     *
     * @param CreateCompleteUserService $createCompleteUserService
     */
    public function __construct(
        CreateCompleteUserService $createCompleteUserService
    ) {
        $this->createCompleteUserService = $createCompleteUserService;
    }

    /**
     * Create a new complete user.
     *
     * @param RegisterUserRequest $request
     * @return Response
     */
    public function __invoke(RegisterUserRequest $request): Response
    {
        $user = ($this->createCompleteUserService)($request->input());

        return response(
            [
                'message' => 'Registrado satisfactoriamente',
                'user' => UserResource::make($user),
            ],
            Response::HTTP_CREATED
        );
    }
}
