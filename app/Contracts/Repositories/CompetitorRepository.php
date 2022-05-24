<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface CompetitorRepository extends Repository
{
    /**
     * Retrieves all competitors enrolled in that tournament.
     *
     * @param string $tournamentId
     * @return Collection
     */
    public function findManyEnrolledToTournament(string $tournamentId): Collection;
}
