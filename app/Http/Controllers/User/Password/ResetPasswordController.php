<?php

namespace App\Http\Controllers\User\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Services\User\Password\ResetPasswordService;
use Illuminate\Http\Response;

class ResetPasswordController extends Controller
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
     * @return void
     */
    public function __construct(
        ResetPasswordService $resetPasswordService
    ) {
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
        $isResseted = ($this->resetPasswordService)(
            $request->input('email'),
            $request->input('token'),
            $request->input('new_password'),
        );

        if (!$isResseted) {
            return response(
                [
                    'message' => 'No se pudo actualizar la contraseña',
                ],
                Response::HTTP_FORBIDDEN,
            );
        }

        return response(
            [
                'message' => 'Se actualizó la contraseña',
            ],
            Response::HTTP_OK,
        );
    }
}
