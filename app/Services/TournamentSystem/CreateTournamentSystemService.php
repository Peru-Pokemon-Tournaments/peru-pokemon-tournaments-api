<?php

namespace App\Services\TournamentSystem;

use App\Contracts\Repositories\TournamentSystemRepository;
use App\Models\TournamentSystem;

class CreateTournamentSystemService
{
    /**
     * The TournamentSystem repository.
     *
     * @var TournamentSystemRepository
     */
    private TournamentSystemRepository $tournamentSystemRepository;

    /**
     * Create a new CreateTournamentSystemService instance.
     *
     * @param TournamentSystemRepository $tournamentSystemRepository
     */
    public function __construct(TournamentSystemRepository $tournamentSystemRepository)
    {
        $this->tournamentSystemRepository = $tournamentSystemRepository;
    }

    /**
     * Create a new tournament system.
     *
     * @param array $attributes
     * @return TournamentSystem
     */
    public function __invoke(array $attributes): TournamentSystem
    {
        $tournamentSystem = new TournamentSystem($attributes);

        $this->tournamentSystemRepository->save($tournamentSystem);

        return $tournamentSystem;
    }
}
