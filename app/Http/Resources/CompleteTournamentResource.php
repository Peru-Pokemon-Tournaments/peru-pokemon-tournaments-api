<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompleteTournamentResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var \App\Models\Tournament
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
                'image' => $this->resource->image,
                'tournament_type' => $this->resource->tournamentType,
                'devices' => $this->resource->devices,
                'games' => $this->resource->games,
                'tournament_format' => $this->resource->tournamentFormat,
                'tournament_price' => $this->resource->tournamentPrice,
                'tournament_prizes' => $this->resource->tournamentPrizes,
                'tournament_rules' => $this->resource->tournamentRules,
                'tournament_systems' => $this->resource->tournamentSystems,
                'created_by' => $this->resource->createdBy,
                'external_bracket' => $this->resource->externalBracket,
            ],
        );
    }
}
