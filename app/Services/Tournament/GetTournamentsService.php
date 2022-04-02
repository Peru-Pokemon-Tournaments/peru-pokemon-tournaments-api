<?php

namespace App\Services\Tournament;

use App\Contracts\Repositories\TournamentRepository;

class GetTournamentsService
{
    /**
     * The tournament repository
     *
     * @var TournamentRepository
     */
    private TournamentRepository $tournamentRepository;


    /**
     * Create new GetTournamentsService
     *
     * @param   TournamentRepository $tournamentRepository
     * @return  void
     */
    public function __construct(
        TournamentRepository $tournamentRepository
    )
    {
        $this->tournamentRepository = $tournamentRepository;
    }

    /**
     * Retrieve tournaments
     *
     * @param
     * @return  \Illuminate\Support\Collection
     */
    public function __invoke()
    {
        return $this->tournamentRepository->getAll();
    }

}
