<?php

namespace App\Services\Tournament;

use App\Contracts\Repositories\TournamentRepository;
use App\Models\Tournament;
use Illuminate\Support\Collection;

class GetTournamentsService
{
    /**
     * The tournament repository.
     *
     * @var TournamentRepository
     */
    private TournamentRepository $tournamentRepository;

    /**
     * Create new GetTournamentsService.
     *
     * @param   TournamentRepository $tournamentRepository
     * @return  void
     */
    public function __construct(
        TournamentRepository $tournamentRepository
    ) {
        $this->tournamentRepository = $tournamentRepository;
    }

    /**
     * Retrieve tournaments.
     *
     * @param
     * @return  Collection|Tournament[]
     */
    public function __invoke(): Collection
    {
        return $this->tournamentRepository->getAll();
    }
}
