<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Competitor\CompetitorResource;
use App\Http\Resources\Person\PersonResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var User
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
            'email' => $this->resource->email,
            'competitor' => $this->whenLoaded('competitor', function () {
                return CompetitorResource::make($this->resource->competitor);
            }),
            'person' => $this->whenLoaded('person', function () {
                return PersonResource::make($this->resource->person);
            }),
        ];
    }
}
