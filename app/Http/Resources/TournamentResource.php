<?php

namespace App\Http\Resources;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Tournament
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
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
                'tournament_systems' => $this->resource->tournamentSystems,
                'external_bracket' => $this->resource->externalBracket,
            ],
        );
    }
}
