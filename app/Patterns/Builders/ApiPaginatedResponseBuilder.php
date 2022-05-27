<?php

namespace App\Patterns\Builders;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Response;

class ApiPaginatedResponseBuilder extends ApiResponseBuilder implements PaginatedResponseBuilder
{
    private ?LengthAwarePaginator $lengthAwarePaginator;

    /**
     * Set the total of resources.
     *
     * @param int $total
     * @return $this
     */
    public function setTotal(int $total): self
    {
        $this->resources['total'] = $total;

        return $this;
    }

    /**
     * Set the quantity per page.
     *
     * @param int $perPage
     * @return $this
     */
    public function setPerPage(int $perPage): self
    {
        $this->resources['per_page'] = $perPage;

        return $this;
    }

    /**
     * Set the current page.
     *
     * @param int $currentPage
     * @return $this
     */
    public function setCurrentPage(int $currentPage): self
    {
        $this->resources['current_page'] = $currentPage;

        return $this;
    }

    /**
     * Set the last page.
     *
     * @param int $lastPage
     * @return $this
     */
    public function setLastPage(int $lastPage): self
    {
        $this->resources['last_page'] = $lastPage;

        return $this;
    }

    /**
     * Set the total pages count.
     *
     * @param int $totalPages
     * @return $this
     */
    public function setTotalPages(int $totalPages): self
    {
        $this->resources['total_pages'] = $totalPages;

        return $this;
    }

    /**
     * Set the associated LengthAwarePaginator.
     *
     * @param LengthAwarePaginator $lengthAwarePaginator
     * @return $this
     */
    public function setLengthAwarePaginator(LengthAwarePaginator $lengthAwarePaginator): self
    {
        $this->lengthAwarePaginator = $lengthAwarePaginator;

        return $this;
    }

    /**
     * Retrieve the built response.
     *
     * @return Response
     */
    public function get(): Response
    {
        if ($this->lengthAwarePaginator) {
            $totalPages = ceil($this->lengthAwarePaginator->total() / $this->lengthAwarePaginator->perPage());
            $this->setTotal($this->lengthAwarePaginator->total());
            $this->setPerPage($this->lengthAwarePaginator->perPage());
            $this->setCurrentPage($this->lengthAwarePaginator->currentPage());
            $this->setLastPage($this->lengthAwarePaginator->lastPage());
            $this->setTotalPages($totalPages);
        }

        return parent::get();
    }
}
