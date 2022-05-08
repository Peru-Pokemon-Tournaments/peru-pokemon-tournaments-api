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
     * @var \App\Services\User\Password\CreatePasswordResetService
     */
    private CreateOrUpdatePasswordResetService $createOrUpdatePasswordResetService;

    /**
     * Create a new CreatePasswordResetController instance
     *
     * @param \App\Services\User\Password\CreateOrUpdatePasswordResetService
     * @return void
     */
    public function __construct(
        CreateOrUpdatePasswordResetService $createOrUpdatePasswordResetService
    )
    {
        $this->createOrUpdatePasswordResetService = $createOrUpdatePasswordResetService;
    }

    public function __invoke(CreatePasswordResetRequest $request)
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
