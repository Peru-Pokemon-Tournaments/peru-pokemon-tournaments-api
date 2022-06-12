<?php

namespace App\Http\Resources\TournamentSystem;

use App\Http\Resources\TournamentResource;
use App\Models\TournamentSystem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentSystemResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var TournamentSystem
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
            'description' => $this->resource->description,
            'tournaments' => $this->whenLoaded('tournaments', function () {
                return TournamentResource::collection($this->resource->tournaments);
            }),
        ];
    }
}
