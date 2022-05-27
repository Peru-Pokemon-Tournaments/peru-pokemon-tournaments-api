<?php

namespace App\Http\Resources\Person;

use App\Http\Resources\User\UserResource;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Person
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
            'first_name' => $this->resource->first_name,
            'last_name' => $this->resource->last_name,
            'full_name' => $this->resource->fullName,
            'users' => $this->whenLoaded('users', function () {
                return UserResource::collection($this->resource->users);
            }),
        ];
    }
}
