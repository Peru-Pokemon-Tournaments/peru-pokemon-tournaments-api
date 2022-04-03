<?php

namespace App\Contracts\Repositories;

interface CompetitorRepository extends Repository
{
    /**
     * Retrieves all competitors enrolled in that tournament
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findManyEnrolledToTournament(string $tournamentId);
}
