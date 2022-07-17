<?php

namespace App\Services\TournamentResult;

use App\Contracts\Repositories\TournamentResultRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FetchTournamentResultsService
{
    /**
     * The tournament result repository.
     *
     * @var TournamentResultRepository
     */
    private TournamentResultRepository $tournamentResultRepository;

    /**
     * Create a new FetchTournamentResultsService instance.
     *
     * @param TournamentResultRepository $tournamentResultRepository
     */
    public function __construct(TournamentResultRepository $tournamentResultRepository)
    {
        $this->tournamentResultRepository = $tournamentResultRepository;
    }

    /**
     * Retrieve all tournament results paginated.
     *
     * @param int $page
     * @param int $pageSize
     * @param array|null $filters
     * @return LengthAwarePaginator
     */
    public function __invoke(int $page, int $pageSize, ?array $filters): LengthAwarePaginator
    {
        if (is_null($filters)) {
            return $this->tournamentResultRepository->getPaginatedFiltered($page, $pageSize);
        }

        return $this->tournamentResultRepository->getPaginatedFiltered($page, $pageSize, $filters);
    }
}
