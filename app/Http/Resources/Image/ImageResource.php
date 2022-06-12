<?php

namespace App\Http\Resources\Image;

use App\Http\Resources\Tournament\TournamentResource;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Image
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
            'name' => $this->resource->name,
            'url' => $this->resource->url,
            'tournaments' => $this->whenLoaded('tournaments', function () {
                return TournamentResource::collection($this->resource->tournaments);
            }),
        ];
    }
}
