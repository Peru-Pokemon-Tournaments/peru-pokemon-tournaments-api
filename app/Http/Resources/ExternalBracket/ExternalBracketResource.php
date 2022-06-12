<?php

namespace App\Http\Resources\ExternalBracket;

use App\Http\Resources\Tournament\TournamentResource;
use App\Models\ExternalBracket;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExternalBracketResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var ExternalBracket
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
            'reference' => $this->resource->reference,
            'url' => $this->resource->url,
            'tournament' => $this->whenLoaded('tournament', function () {
                return TournamentResource::make($this->resource->tournament);
            }),
        ];
    }
}
