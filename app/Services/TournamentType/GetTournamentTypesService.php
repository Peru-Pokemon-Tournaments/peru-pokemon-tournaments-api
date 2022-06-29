<?php

namespace App\Services\TournamentType;

use App\Contracts\Repositories\TournamentTypeRepository;
use App\Models\TournamentType;
use Illuminate\Support\Collection;

class GetTournamentTypesService
{
    /**
     * The tournament type repository.
     *
     * @var TournamentTypeRepository
     */
    private TournamentTypeRepository $tournamentTypeRepository;

    /**
     * Create a new GetTournamentTypesService instance.
     *
     * @param TournamentTypeRepository $tournamentTypeRepository
     */
    public function __construct(TournamentTypeRepository $tournamentTypeRepository)
    {
        $this->tournamentTypeRepository = $tournamentTypeRepository;
    }

    /**
     * Retrieves all tournament types.
     *
     * @return Collection|TournamentType[]
     */
    public function __invoke(): Collection
    {
        return $this->tournamentTypeRepository->getAll();
    }
}
