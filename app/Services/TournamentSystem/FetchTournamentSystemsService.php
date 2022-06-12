<?php

namespace App\Services\TournamentSystem;

use App\Contracts\Repositories\TournamentSystemRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FetchTournamentSystemsService
{
    /**
     * The tournament system repository.
     *
     * @var TournamentSystemRepository
     */
    private TournamentSystemRepository $tournamentSystemRepository;

    /**
     * Create a new FetchTournamentSystemsService instance.
     *
     * @param TournamentSystemRepository $tournamentSystemRepository
     */
    public function __construct(TournamentSystemRepository $tournamentSystemRepository)
    {
        $this->tournamentSystemRepository = $tournamentSystemRepository;
    }

    /**
     * Retrieve all tournament systems paginated.
     *
     * @param int $page
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function __invoke(int $page, int $pageSize): LengthAwarePaginator
    {
        return $this->tournamentSystemRepository->getPaginated($page, $pageSize);
    }
}
