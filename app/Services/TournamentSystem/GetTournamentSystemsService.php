<?php

namespace App\Services\TournamentSystem;

use App\Contracts\Repositories\TournamentSystemRepository;
use App\Models\TournamentSystem;
use Illuminate\Support\Collection;

class GetTournamentSystemsService
{
    /**
     * The tournament system repository.
     *
     * @var TournamentSystemRepository
     */
    private TournamentSystemRepository $tournamentSystemRepository;

    /**
     * Create a new GetTournamentSystemsService instance.
     *
     * @param TournamentSystemRepository $tournamentSystemRepository
     */
    public function __construct(TournamentSystemRepository $tournamentSystemRepository)
    {
        $this->tournamentSystemRepository = $tournamentSystemRepository;
    }

    /**
     * Retrieves all tournament systems.
     *
     * @return Collection|TournamentSystem[]
     */
    public function __invoke(): Collection
    {
        return $this->tournamentSystemRepository->getAll();
    }
}
