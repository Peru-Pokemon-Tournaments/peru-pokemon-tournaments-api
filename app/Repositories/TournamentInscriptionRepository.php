<?php

namespace App\Repositories;

use App\Contracts\Repositories\TournamentInscriptionRepository as TournamentInscriptionRepositoryContract;
use App\Models\TournamentInscription;
use App\Traits\Repositories\CommonMethods;

final class TournamentInscriptionRepository implements TournamentInscriptionRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return TournamentInscription::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return TournamentInscription::find($id);
    }

    /**
     * Find many models by ids
     *
     * @param  array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany(array $ids)
    {
        return TournamentInscription::findMany($ids);
    }
}
