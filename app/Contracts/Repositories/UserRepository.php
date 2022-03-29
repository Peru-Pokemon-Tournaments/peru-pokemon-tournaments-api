<?php

namespace App\Contracts\Repositories;

use App\Models\User;

interface UserRepository extends Repository
{
    /**
     * Find one user by email
     *
     * @param  string $email
     * @param  string $relationships
     * @return \App\Models\User
     */
    public function findOneByEmail(string &$email, array $relationships = []);
}
