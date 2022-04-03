<?php

namespace App\Contracts\Repositories;

interface TournamentInscriptionRepository extends Repository
{
    /**
     * Find one model by tournamenId and competitorId
     *
     * @param  string $tournamentId
     * @param  string $competitorId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOneByTournamentAndCompetitor(string $tournamentId, string $competitorId);
}
