<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\TournamentResource;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Device
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
            'tournaments' => $this->whenLoaded('tournaments', function () {
                return TournamentResource::collection($this->resource->tournaments);
            }),
        ];
    }
}
