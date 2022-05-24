<?php

namespace App\Repositories;

use App\Contracts\Repositories\CompetitorRepository as CompetitorRepositoryContract;
use App\Models\Competitor;
use App\Models\TournamentInscription;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class CompetitorRepository implements CompetitorRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection|Competitor[]
     */
    public function getAll(): Collection
    {
        return Competitor::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return Competitor
     */
    public function findOne(string &$id): Competitor
    {
        return Competitor::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<Competitor>|Competitor[]
     */
    public function findMany(array $ids): Collection
    {
        return Competitor::findMany($ids);
    }

    /**
     * Retrieves all competitors enrolled in that tournament.
     *
     * @param  string $tournamentId
     * @return Collection<Competitor>|Competitor[]
     */
    public function findManyEnrolledToTournament(string $tournamentId): Collection
    {
        return TournamentInscription::where('tournament_id', $tournamentId)
            ->get()
            ->map(function (TournamentInscription $tournamentInscription) {
                return $tournamentInscription->competitor;
            });
    }
}
