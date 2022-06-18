<?php

namespace App\Services\TournamentType;

use App\Contracts\Repositories\TournamentTypeRepository;
use App\Models\TournamentType;

class CreateTournamentTypeService
{
    /**
     * The TournamentType repository.
     *
     * @var TournamentTypeRepository
     */
    private TournamentTypeRepository $tournamentTypeRepository;

    /**
     * Create a new CreateTournamentTypeService instance.
     *
     * @param TournamentTypeRepository $tournamentTypeRepository
     */
    public function __construct(TournamentTypeRepository $tournamentTypeRepository)
    {
        $this->tournamentTypeRepository = $tournamentTypeRepository;
    }

    /**
     * Create a new tournament type.
     *
     * @param array $attributes
     * @return TournamentType
     */
    public function __invoke(array $attributes): TournamentType
    {
        $tournamentType = new TournamentType($attributes);

        $this->tournamentTypeRepository->save($tournamentType);

        return $tournamentType;
    }
}
