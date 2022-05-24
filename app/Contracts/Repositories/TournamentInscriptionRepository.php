<?php

namespace App\Contracts\Repositories;

use App\Models\TournamentInscription;

interface TournamentInscriptionRepository extends Repository
{
    /**
     * Find one model by tournamentId and competitorId.
     *
     * @param  string $tournamentId
     * @param  string $competitorId
     * @return TournamentInscription|null
     */
    public function findOneByTournamentAndCompetitor(string $tournamentId, string $competitorId): ?TournamentInscription;
}
