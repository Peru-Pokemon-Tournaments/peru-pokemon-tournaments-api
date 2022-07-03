<?php

namespace App\Contracts\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PaginatedFilteredRepository
{
    /**
     * Retrieve resource paginated and filtered.
     *
     * @param int $page
     * @param int|null $pageSize
     * @param array $filters
     * @return LengthAwarePaginator
     */
    public function getPaginatedFiltered(
        int $page = 1,
        ?int $pageSize = null,
        array $filters = []
    ): LengthAwarePaginator;
}
