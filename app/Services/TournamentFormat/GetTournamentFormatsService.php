<?php

namespace App\Services\TournamentFormat;

use App\Contracts\Repositories\TournamentFormatRepository;
use App\Models\TournamentFormat;
use Illuminate\Support\Collection;

class GetTournamentFormatsService
{
    /**
     * The tournament format repository.
     *
     * @var TournamentFormatRepository
     */
    private TournamentFormatRepository $tournamentFormatRepository;

    /**
     * Create a new GetTournamentFormatsService instance.
     *
     * @param TournamentFormatRepository $tournamentFormatRepository
     */
    public function __construct(TournamentFormatRepository $tournamentFormatRepository)
    {
        $this->tournamentFormatRepository = $tournamentFormatRepository;
    }

    /**
     * Retrieves all tournament formats.
     *
     * @return Collection|TournamentFormat[]
     */
    public function __invoke(): Collection
    {
        return $this->tournamentFormatRepository->getAll();
    }
}
