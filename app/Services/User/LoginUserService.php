<?php

namespace App\Services\User;

class LoginUserService
{
    /**
     * Check if the user has valid password.
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function __invoke(string $email, string $password): bool
    {
        return auth()->attempt([
            'email' => $email,
            'password' => $password,
        ]);
    }
}
