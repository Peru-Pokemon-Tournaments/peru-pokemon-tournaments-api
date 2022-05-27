<?php

namespace App\Http\Resources\TournamentRule;

use App\Models\TournamentRule;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentRuleResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var TournamentRule
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
        ];
    }
}
