<?php

namespace App\Services\User;

use App\Contracts\Repositories\UserRepository;

class LoginUserService
{
    /**
     * User Repository
     *
     * @var App\Contracts\Repositories\UserRepository
     */
    private UserRepository $userRepository;

    /**
     * Create a new LoginUserService instance.
     *
     * @param  UserRepository $userRepository
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Check if the user has valid password
     *
     * @param string $email
     * @param string $password
     * @return string|null
     */
    public function __invoke(string $email, string $password)
    {
        return auth()->attempt([
            'email' => $email,
            'password' => $password,
        ]);
    }
}
