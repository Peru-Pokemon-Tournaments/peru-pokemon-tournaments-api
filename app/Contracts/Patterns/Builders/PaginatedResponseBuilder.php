<?php

namespace App\Contracts\Patterns\Builders;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PaginatedResponseBuilder extends ResponseBuilder
{
    /**
     * Set the total of resources.
     *
     * @param int $total
     * @return $this
     */
    public function setTotal(int $total): self;

    /**
     * Set the quantity per page.
     *
     * @param int $perPage
     * @return $this
     */
    public function setPerPage(int $perPage): self;

    /**
     * Set the current page.
     *
     * @param int $currentPage
     * @return $this
     */
    public function setCurrentPage(int $currentPage): self;

    /**
     * Set the last page.
     *
     * @param int $lastPage
     * @return $this
     */
    public function setLastPage(int $lastPage): self;

    /**
     * Set the total pages count.
     *
     * @param int $totalPages
     * @return $this
     */
    public function setTotalPages(int $totalPages): self;

    /**
     * Set the associated LengthAwarePaginator.
     *
     * @param LengthAwarePaginator $lengthAwarePaginator
     * @return $this
     */
    public function setLengthAwarePaginator(LengthAwarePaginator $lengthAwarePaginator): self;
}
