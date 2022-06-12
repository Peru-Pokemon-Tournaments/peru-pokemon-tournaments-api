<?php

namespace App\Services\TournamentType;

use App\Contracts\Repositories\TournamentTypeRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FetchTournamentTypesService
{
    /**
     * The tournament type repository.
     *
     * @var TournamentTypeRepository
     */
    private TournamentTypeRepository $tournamentTypeRepository;

    /**
     * Create a new FetchTournamentTypesService instance.
     *
     * @param TournamentTypeRepository $tournamentTypeRepository
     */
    public function __construct(TournamentTypeRepository $tournamentTypeRepository)
    {
        $this->tournamentTypeRepository = $tournamentTypeRepository;
    }

    /**
     * Retrieve all tournament types paginated.
     *
     * @param int $page
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function __invoke(int $page, int $pageSize): LengthAwarePaginator
    {
        return $this->tournamentTypeRepository->getPaginated($page, $pageSize);
    }
}
