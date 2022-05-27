<?php

namespace App\Http\Resources\Competitor;

use App\Http\Resources\User\UserResource;
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
        return [
            'id' => $this->resource->id,
            'nick_name' => $this->resource->nick_name,
            'full_name' => $this->resource->full_name,
            'user' => $this->whenLoaded('user', function () {
                return UserResource::make($this->resource->user);
            }),
        ];
    }
}
