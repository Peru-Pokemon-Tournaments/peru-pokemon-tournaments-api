<?php

namespace App\Http\Controllers\User\Password;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\ResetPasswordRequest;
use App\Services\User\Password\ResetPasswordService;
use Illuminate\Http\Response;

class ResetPasswordController extends BasicController
{
    /**
     * The ResetPasswordService.
     *
     * @var ResetPasswordService
     */
    private ResetPasswordService $resetPasswordService;

    /**
     * Create a new ResetPasswordController instance.
     *
     * @param ResetPasswordService $resetPasswordService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        ResetPasswordService $resetPasswordService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->resetPasswordService = $resetPasswordService;
    }

    /**
     * Reset password forget.
     *
     * @param ResetPasswordRequest $request
     * @return Response
     */
    public function __invoke(ResetPasswordRequest $request): Response
    {
        $isReset = ($this->resetPasswordService)(
            $request->input('email'),
            $request->input('token'),
            $request->input('new_password'),
        );

        return $this->responseBuilder
            ->when(
                $isReset,
                fn (ResponseBuilder $builder) => $builder
                        ->setMessage('Se actualizó la contraseña')
                        ->setStatusCode(Response::HTTP_OK),
                fn (ResponseBuilder $builder) => $builder
                        ->setMessage('No se pudo actualizar la contraseña')
                        ->setStatusCode(Response::HTTP_FORBIDDEN)
            )
            ->get();
    }
}
