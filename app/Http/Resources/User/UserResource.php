<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return array_merge(
            $this->resource->toArray(),
            [
                'person' => $this->resource->person,
                'competitor' => $this->resource->competitor,
            ],
        );
    }
}