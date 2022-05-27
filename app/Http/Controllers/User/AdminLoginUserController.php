<?php

namespace App\Http\Controllers\User;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\LoginUserRequest;
use App\Services\User\GetUserByEmailService;
use App\Services\User\LoginUserService;
use Illuminate\Http\Response;

class AdminLoginUserController extends BasicController
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
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        LoginUserService $loginUserService,
        GetUserByEmailService $getUserByEmailService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
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

        return $this->responseBuilder
            ->when(
                (!$tokenOrFalse || !$user->hasRole('super admin')),
                fn (ResponseBuilder $builder) => $builder
                        ->setMessage('No se pudo autenticar')
                        ->setStatusCode(Response::HTTP_UNAUTHORIZED),
                fn (ResponseBuilder $builder) => $builder
                        ->setMessage('Has ingresado a Perú Pokémon Tournaments Admin')
                        ->setResource('token', $tokenOrFalse)
                        ->setResource('user', $user->load(['person', 'competitor']))
                        ->setStatusCode(Response::HTTP_OK)
            )
            ->get();
    }
}
