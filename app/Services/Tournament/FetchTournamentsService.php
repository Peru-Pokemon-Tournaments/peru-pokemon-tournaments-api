<?php

namespace App\Services\Tournament;

use App\Contracts\Repositories\TournamentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FetchTournamentsService
{
    /**
     * The tournament repository.
     *
     * @var TournamentRepository
     */
    private TournamentRepository $tournamentRepository;

    /**
     * Create a new FetchTournamentsService instance.
     *
     * @param TournamentRepository $tournamentRepository
     */
    public function __construct(TournamentRepository $tournamentRepository)
    {
        $this->tournamentRepository = $tournamentRepository;
    }

    /**
     * Retrieve all tournaments paginated.
     *
     * @param int $page
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function __invoke(int $page, int $pageSize): LengthAwarePaginator
    {
        return $this->tournamentRepository->getPaginated($page, $pageSize);
    }
}
