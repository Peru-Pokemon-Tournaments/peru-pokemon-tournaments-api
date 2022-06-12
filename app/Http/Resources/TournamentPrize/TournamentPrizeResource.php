<?php

namespace App\Http\Resources\TournamentPrize;

use App\Models\TournamentPrize;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentPrizeResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var TournamentPrize
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
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'tournament' => $this->whenLoaded('tournament_prize', function () {
                return self::make($this->resource->tournament);
            }),
        ];
    }
}
