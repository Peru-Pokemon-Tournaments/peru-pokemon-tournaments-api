<?php

namespace App\Http\Resources\TournamentPrice;

use App\Models\TournamentPrice;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentPriceResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var TournamentPrice
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
            'symbol' => $this->resource->symbol,
            'amount' => $this->resource->amount,
        ];
    }
}
