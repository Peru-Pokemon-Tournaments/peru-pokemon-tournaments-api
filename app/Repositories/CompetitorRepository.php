<?php

namespace App\Repositories;

use App\Contracts\Repositories\CompetitorRepository as CompetitorRepositoryContract;
use App\Models\Competitor;
use App\Models\TournamentInscription;
use App\Traits\Repositories\CommonMethods;

final class CompetitorRepository implements CompetitorRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Competitor::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return Competitor::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return Competitor::findMany($ids);
    }

    /**
     * Retrieves all competitors enrolled in that tournament
     *
     * @param  string $tournamentId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findManyEnrolledToTournament(string $tournamentId)
    {
        return TournamentInscription::where('tournament_id', $tournamentId)
            ->get()
            ->map(function (TournamentInscription $tournamentInscription) {
                return $tournamentInscription->competitor;
            })
            ->collect();
    }
}
