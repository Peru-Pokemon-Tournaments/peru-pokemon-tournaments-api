<?php

namespace App\Http\Resources\TournamentResult;

use App\Http\Resources\TournamentInscription\TournamentInscriptionResource;
use App\Models\TournamentResult;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentResultResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var TournamentResult
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
            'place' => $this->resource->place,
            'score' => $this->resource->score,
            'tournament_inscription' => $this->whenLoaded('tournamentInscription', function () {
                return TournamentInscriptionResource::make($this->resource->tournamentInscription);
            }),
        ];
    }
}
