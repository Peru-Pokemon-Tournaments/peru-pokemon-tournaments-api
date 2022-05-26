<?php

namespace App\Http\Resources\Game;

use App\Http\Resources\GameGeneration\GameGenerationResource;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Game
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
            'game_generation' => $this->whenLoaded('gameGeneration', function () {
                return GameGenerationResource::make($this->resource->gameGeneration);
            }),
        ];
    }
}
