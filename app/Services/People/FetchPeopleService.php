<?php

namespace App\Services\People;

use App\Contracts\Repositories\PersonRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FetchPeopleService
{
    /**
     * The person repository.
     *
     * @var PersonRepository
     */
    private PersonRepository $personRepository;

    /**
     * Create a new FetchPeopleService instance.
     *
     * @param PersonRepository $personRepository
     */
    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * Retrieve all people paginated.
     *
     * @param int $page
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function __invoke(int $page, int $pageSize): LengthAwarePaginator
    {
        return $this->personRepository->getPaginated($page, $pageSize);
    }
}
