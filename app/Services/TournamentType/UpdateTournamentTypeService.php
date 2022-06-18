<?php

namespace App\Services\TournamentType;

use App\Contracts\Repositories\TournamentTypeRepository;
use App\Models\TournamentType;
use Illuminate\Database\Eloquent\Model;

class UpdateTournamentTypeService
{
    /**
     * The tournament type repository.
     *
     * @var TournamentTypeRepository
     */
    private TournamentTypeRepository $tournamentTypeRepository;

    /**
     * Create a new UpdateTournamentTypeService instance.
     *
     * @param TournamentTypeRepository $tournamentTypeRepository
     */
    public function __construct(TournamentTypeRepository $tournamentTypeRepository)
    {
        $this->tournamentTypeRepository = $tournamentTypeRepository;
    }

    /**
     * Update a tournament type.
     *
     * @param TournamentType|string $tournamentType
     * @param array $attributes
     * @return TournamentType|Model
     */
    public function __invoke($tournamentType, array $attributes): TournamentType
    {
        $tournamentTypeId = $tournamentType;

        if ($tournamentType instanceof TournamentType) {
            $tournamentTypeId = $tournamentType->id;
        }

        $this->tournamentTypeRepository->update($tournamentTypeId, $attributes);

        return $this->tournamentTypeRepository->findOne($tournamentTypeId);
    }
}
