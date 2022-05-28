<?php

namespace App\Http\Controllers\User\Password;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Events\PasswordResetCreated;
use App\Http\Controllers\BasicController;
use App\Http\Requests\CreatePasswordResetRequest;
use App\Services\User\Password\CreateOrUpdatePasswordResetService;
use Illuminate\Http\Response;

class CreatePasswordResetController extends BasicController
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
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreateOrUpdatePasswordResetService $createOrUpdatePasswordResetService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
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

        return $this->responseBuilder
            ->setMessage(trans('endpoints.user.password.create_password_reset.ok'))
            ->setStatusCode(Response::HTTP_ACCEPTED)
            ->get();
    }
}
