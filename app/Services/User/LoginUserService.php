<?php

namespace App\Services\User;

class LoginUserService
{
    /**
     * Check if the user has valid password.
     *
     * @param string $email
     * @param string $password
     * @return bool|string
     */
    public function __invoke(string $email, string $password)
    {
        $tokenOrFalse = auth()->attempt([
            'email' => $email,
            'password' => $password,
        ]);

        if (gettype($tokenOrFalse) == 'string') {
            return (string) $tokenOrFalse;
        }

        return (bool) $tokenOrFalse;
    }
}
