<?php

namespace App\Http\Controllers\User\Password;

use App\Events\PasswordResetCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePasswordResetRequest;
use App\Services\User\Password\CreateOrUpdatePasswordResetService;
use Illuminate\Http\Response;

class CreatePasswordResetController extends Controller
{
    /**
     * The CreateOrUpdatePasswordResetService.
     *
     * @var CreateOrUpdatePasswordResetService
     */
    private CreateOrUpdatePasswordResetService $createOrUpdatePasswordResetService;

    /**
     * Create a new CreatePasswordResetController instance.
     *
     * @param CreateOrUpdatePasswordResetService $createOrUpdatePasswordResetService
     * @return void
     */
    public function __construct(
        CreateOrUpdatePasswordResetService $createOrUpdatePasswordResetService
    ) {
        $this->createOrUpdatePasswordResetService = $createOrUpdatePasswordResetService;
    }

    /**
     * Create a new password reset entry and send email to related user.
     *
     * @param CreatePasswordResetRequest $request
     * @return Response
     */
    public function __invoke(CreatePasswordResetRequest $request): Response
    {
        $passwordReset = ($this->createOrUpdatePasswordResetService)($request->input('email'));

        PasswordResetCreated::dispatch($passwordReset);

        return response(
            [
                'message' => 'Enlace de cambio de contraseña enviado a su correo electrónico',
            ],
            Response::HTTP_ACCEPTED
        );
    }
}
