<?php

namespace App\Http\Resources\TournamentInscription;

use App\Http\Resources\Competitor\CompetitorResource;
use App\Http\Resources\PokemonShowdownTeam\PokemonShowdownTeamResource;
use App\Http\Resources\Tournament\TournamentResource;
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
        return [
            'id' => $this->resource->id,
            'status' => $this->resource->status,
            'tournament' => $this->whenLoaded('tournament', function () {
                return TournamentResource::make($this->resource->tournament);
            }),
            'competitor' => $this->whenLoaded('competitor', function () {
                return CompetitorResource::make($this->resource->competitor);
            }),
            'pokemon_showdown_team' => $this->whenLoaded('pokemonShowdownTeam', function () {
                return PokemonShowdownTeamResource::make($this->resource->pokemonShowdownTeam);
            }),
        ];
    }
}
