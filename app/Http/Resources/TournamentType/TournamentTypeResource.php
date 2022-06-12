<?php

namespace App\Http\Resources\TournamentType;

use App\Http\Resources\Tournament\TournamentResource;
use App\Models\TournamentType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentTypeResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var TournamentType
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
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'tournament' => $this->whenLoaded('tournament', function () {
                return TournamentResource::make($this->resource->tournament);
            }),
        ];
    }
}
