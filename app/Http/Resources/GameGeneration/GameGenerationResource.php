<?php

namespace App\Http\Resources\GameGeneration;

use App\Models\GameGeneration;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameGenerationResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var GameGeneration
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
            'generation' => $this->resource->generation,
            'description' => $this->resource->description,
        ];
    }
}
