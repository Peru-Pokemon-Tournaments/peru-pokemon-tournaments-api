<?php

namespace App\Http\Resources\TournamentFormat;

use App\Models\TournamentFormat;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentFormatResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var TournamentFormat
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
        ];
    }
}
