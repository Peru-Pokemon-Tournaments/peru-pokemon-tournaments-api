<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentInscriptionRepository as TournamentInscriptionRepositoryContract;
use App\Models\TournamentInscription;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class TournamentInscriptionRepository implements TournamentInscriptionRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<TournamentInscription>|TournamentInscription[]
     */
    public function getAll(): Collection
    {
        return TournamentInscription::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return TournamentInscription
     */
    public function findOne(string &$id): TournamentInscription
    {
        return TournamentInscription::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param array $ids
     * @return Collection<TournamentInscription>|TournamentInscription[]
     */
    public function findMany(array $ids): Collection
    {
        return TournamentInscription::findMany($ids);
    }

    /**
     * Find one model by tournamentId and competitorId.
     *
     * @param string $tournamentId
     * @param string $competitorId
     * @return TournamentInscription|null
     */
    public function findOneByTournamentAndCompetitor(string $tournamentId, string $competitorId): ?TournamentInscription
    {
        return TournamentInscription::where('tournament_id', $tournamentId)
            ->where('competitor_id', $competitorId)
            ->get()
            ->first();
    }
}
