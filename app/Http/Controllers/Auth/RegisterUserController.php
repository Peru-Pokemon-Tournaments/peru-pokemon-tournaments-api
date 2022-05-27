<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\User\UserResource;
use App\Services\User\CreateCompleteUserService;
use Illuminate\Http\Response;

class RegisterUserController extends BasicController
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
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreateCompleteUserService $createCompleteUserService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
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

        return $this->responseBuilder
            ->setMessage('Registrado satisfactoriamente')
            ->setResource('user', UserResource::make($user))
            ->setStatusCode(Response::HTTP_CREATED)
            ->get();
    }
}
