<?php

namespace App\Contracts\Repositories;

use App\Models\User;

interface UserRepository extends Repository
{
    /**
     * Find one user by email.
     *
     * @param string $email
     * @param array $relationships
     * @return User|null
     */
    public function findOneByEmail(string &$email, array $relationships = []): ?User;
}
