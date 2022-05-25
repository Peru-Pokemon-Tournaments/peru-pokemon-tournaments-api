<?php

namespace App\Services\User;

use App\Contracts\Repositories\UserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FetchUsersService
{
    /**
     * The user repository.
     *
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * Creates a new FetchUsersService instance.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Retrieve all users paginated.
     *
     * @param int $page
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function __invoke(int $page, int $pageSize): LengthAwarePaginator
    {
        return $this->userRepository->getPaginated($page, $pageSize);
    }
}
