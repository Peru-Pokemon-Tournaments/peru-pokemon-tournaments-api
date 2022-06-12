<?php

namespace App\Http\Resources;

use App\Models\TournamentInscription;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentInscriptionResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var TournamentInscription
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return array_merge(
            $this->resource->toArray(),
            [
                'tournament' => $this->resource->tournament,
                'competitor' => $this->resource->competitor,
                'pokemon_showdown_team' => $this->resource->pokemonShowdownTeam,
            ],
        );
    }
}
