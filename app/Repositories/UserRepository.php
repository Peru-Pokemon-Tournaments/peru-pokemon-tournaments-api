<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepository as UserRepositoryContract;
use App\Models\User;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

final class UserRepository implements UserRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<User>|User[]
     */
    public function getAll(): Collection
    {
        return User::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return User
     */
    public function findOne(string &$id): User
    {
        return User::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<User>|User[]
     */
    public function findMany(array $ids): Collection
    {
        return User::findMany($ids);
    }

    /**
     * Find one user by email.
     *
     * @param string $email
     * @param array $relationships
     * @return User|null
     */
    public function findOneByEmail(string &$email, array $relationships = []): ?User
    {
        return User::with($relationships)->where('email', '=', $email)->first();
    }

    /**
     * Retrieve all users paginated.
     *
     * @param int $page
     * @param int|null $pageSize
     * @return LengthAwarePaginator
     */
    public function getPaginated(int $page = 1, ?int $pageSize = null): LengthAwarePaginator
    {
        return User::paginate($pageSize, ['*'], 'page', $page);
    }
}
