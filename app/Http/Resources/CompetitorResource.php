<?php

namespace App\Http\Resources;

use App\Models\Competitor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompetitorResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Competitor
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
        return $this->resource->toArray();
    }
}
