<?php

namespace App\Services\User;

use App\Contracts\Repositories\UserRepository;
use App\Models\User;

class GetUserByEmailService
{
    /**
     * User Repository.
     *
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * Create a new LoginUserService instance.
     *
     * @param UserRepository $userRepository
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Check if the user has valid password.
     *
     * @param string $email
     * @return User
     */
    public function __invoke(string $email): User
    {
        return $this->userRepository->findOneByEmail($email, ['person']);
    }
}
