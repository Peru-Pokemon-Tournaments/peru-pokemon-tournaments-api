<?php

namespace App\Services\User\Password;

use App\Contracts\Repositories\PasswordResetRepository;
use App\Contracts\Repositories\UserRepository;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CreateOrUpdatePasswordResetService
{
    /**
     * User Repository.
     *
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * Password Reset Repository.
     *
     * @var PasswordResetRepository
     */
    private PasswordResetRepository $passwordResetRepository;

    /**
     * Create a new CreateOrUpdatePasswordResetService instance.
     *
     * @param UserRepository $userRepository
     * @param PasswordResetRepository $passwordResetRepository
     * @return void
     */
    public function __construct(
        UserRepository $userRepository,
        PasswordResetRepository $passwordResetRepository
    ) {
        $this->passwordResetRepository = $passwordResetRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Creates a new Password Reset.
     *
     * @param string $email
     * @return PasswordReset|Model
     */
    public function __invoke(string $email)
    {
        $user = $this->userRepository->findOneByEmail($email);

        $userId = $user->id;

        $passwordReset = $this->passwordResetRepository->findOne($userId);

        $attributes = [
            'user_id' => $userId,
            'token' => Str::random(50),
            'expires_at' => Carbon::now()->addDay(),
        ];

        if (!$passwordReset) {
            $passwordReset = new PasswordReset();

            $passwordReset->user_id = $attributes['user_id'];
            $passwordReset->token = $attributes['token'];
            $passwordReset->expires_at = $attributes['expires_at'];

            $this->passwordResetRepository->save($passwordReset);

            return $passwordReset;
        }

        $passwordReset->user_id = $attributes['user_id'];
        $passwordReset->token = $attributes['token'];
        $passwordReset->expires_at = $attributes['expires_at'];

        $this->passwordResetRepository->update($userId, $attributes);

        return $passwordReset;
    }
}
