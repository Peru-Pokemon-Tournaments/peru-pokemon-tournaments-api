<?php

namespace App\Contracts\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PaginatedRepository
{
    /**
     * Retrieve resource paginated.
     *
     * @param int $page
     * @param int|null $pageSize
     * @return LengthAwarePaginator
     */
    public function getPaginated(int $page = 1, ?int $pageSize = null): LengthAwarePaginator;
}
