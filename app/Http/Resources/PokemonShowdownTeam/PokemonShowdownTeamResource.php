<?php

namespace App\Http\Resources\PokemonShowdownTeam;

use App\Http\Resources\TournamentInscription\TournamentInscriptionResource;
use App\Models\PokemonShowdownTeam;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PokemonShowdownTeamResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var PokemonShowdownTeam
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'team' => $this->resource->team,
            'tournament_inscription' => $this->whenLoaded('tournamentInscription', function () {
                return TournamentInscriptionResource::make($this->resource->tournamentInscription);
            }),
        ];
    }
}
