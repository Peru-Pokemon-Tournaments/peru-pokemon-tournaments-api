<?php

namespace App\Services\TournamentSystem;

use App\Contracts\Repositories\TournamentSystemRepository;
use App\Models\TournamentSystem;
use Illuminate\Database\Eloquent\Model;

class UpdateTournamentSystemService
{
    /**
     * The tournament system repository.
     *
     * @var TournamentSystemRepository
     */
    private TournamentSystemRepository $tournamentSystemRepository;

    /**
     * Create a new UpdateTournamentSystemService instance.
     *
     * @param TournamentSystemRepository $tournamentSystemRepository
     */
    public function __construct(TournamentSystemRepository $tournamentSystemRepository)
    {
        $this->tournamentSystemRepository = $tournamentSystemRepository;
    }

    /**
     * Update a tournament system.
     *
     * @param TournamentSystem|string $tournamentSystem
     * @param array $attributes
     * @return TournamentSystem|Model
     */
    public function __invoke($tournamentSystem, array $attributes): TournamentSystem
    {
        $tournamentSystemId = $tournamentSystem;

        if ($tournamentSystem instanceof TournamentSystem) {
            $tournamentSystemId = $tournamentSystem->id;
        }

        $this->tournamentSystemRepository->update($tournamentSystemId, $attributes);

        return $this->tournamentSystemRepository->findOne($tournamentSystemId);
    }
}
