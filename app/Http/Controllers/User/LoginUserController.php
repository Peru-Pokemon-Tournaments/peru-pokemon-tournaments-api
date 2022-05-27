<?php

namespace App\Http\Controllers\User;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\User\UserResource;
use App\Services\User\GetUserByEmailService;
use App\Services\User\LoginUserService;
use Illuminate\Http\Response;

class LoginUserController extends BasicController
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

        return $this->responseBuilder
            ->when(
                !$tokenOrFalse,
                fn (ResponseBuilder & $builder) => $builder
                        ->setMessage('No se pudo autenticar')
                        ->setStatusCode(Response::HTTP_UNAUTHORIZED),
                function (ResponseBuilder &$builder) use ($tokenOrFalse, $request) {
                    $user = ($this->getUserByEmailService)($request->input('email'));
                    $user->load(['person', 'competitor']);

                    $builder
                        ->setMessage('Has ingresado a Perú Pokémon Tournaments')
                        ->setResource('token', $tokenOrFalse)
                        ->setResource('user', UserResource::make($user))
                        ->setStatusCode(Response::HTTP_OK);
                }
            )
            ->get();
    }
}
