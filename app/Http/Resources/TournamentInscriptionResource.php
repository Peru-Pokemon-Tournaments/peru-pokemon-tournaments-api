<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TournamentInscriptionResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var \App\Models\TournamentInscription
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
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
