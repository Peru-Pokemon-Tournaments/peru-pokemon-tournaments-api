<?php

namespace App\Http\Resources;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccessAuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'token' => $this->resource['token'],
            'user' => UserResource::make($this->resource['user']),
            'message' => 'Has ingresado a Perú Pokémon Tournaments',
        ];
    }
}
