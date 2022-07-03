<?php

namespace App\Services\TournamentInscription;

use App\Contracts\Repositories\TournamentInscriptionRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FetchTournamentInscriptionsService
{
    /**
     * The tournament inscription repository.
     *
     * @var TournamentInscriptionRepository
     */
    private TournamentInscriptionRepository $tournamentInscriptionRepository;

    /**
     * Create a new FetchTournamentInscriptionsService instance.
     *
     * @param TournamentInscriptionRepository $tournamentInscriptionRepository
     */
    public function __construct(TournamentInscriptionRepository $tournamentInscriptionRepository)
    {
        $this->tournamentInscriptionRepository = $tournamentInscriptionRepository;
    }

    /**
     * Retrieve all tournament inscriptions paginated.
     *
     * @param int $page
     * @param int $pageSize
     * @param array|null $filters
     * @return LengthAwarePaginator
     */
    public function __invoke(int $page, int $pageSize, ?array $filters): LengthAwarePaginator
    {
        if (is_null($filters)) {
            return $this->tournamentInscriptionRepository->getPaginatedFiltered($page, $pageSize);
        }

        return $this->tournamentInscriptionRepository->getPaginatedFiltered($page, $pageSize, $filters);
    }
}
