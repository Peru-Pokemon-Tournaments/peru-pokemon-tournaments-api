<?php

namespace App\Services\User\Password;

use App\Contracts\Repositories\PasswordResetRepository;
use App\Contracts\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ResetPasswordService
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
     * Create a new class ResetPasswordService instance.
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
     * Reset password of a user.
     *
     * @param string $email
     * @param string $token
     * @param string $newPassword
     * @return bool
     */
    public function __invoke(string $email, string $token, string $newPassword): bool
    {
        $user = $this->userRepository->findOneByEmail($email);

        $userId = $user->id;

        $passwordReset = $this->passwordResetRepository->findOne($userId);

        if (!$passwordReset) {
            return false;
        }

        if (Carbon::now()->gt($passwordReset->expires_at) ||
            $passwordReset->token != $token) {
            return false;
        }

        $user->password = Hash::make($newPassword);

        return $this->userRepository->save($user);
    }
}
