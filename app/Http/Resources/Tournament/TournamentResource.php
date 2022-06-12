<?php

namespace App\Http\Resources\Tournament;

use App\Http\Resources\Device\DeviceResource;
use App\Http\Resources\ExternalBracket\ExternalBracketResource;
use App\Http\Resources\Game\GameResource;
use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\Person\PersonResource;
use App\Http\Resources\TournamentFormat\TournamentFormatResource;
use App\Http\Resources\TournamentPrice\TournamentPriceResource;
use App\Http\Resources\TournamentPrize\TournamentPrizeResource;
use App\Http\Resources\TournamentRule\TournamentRuleResource;
use App\Http\Resources\TournamentSystem\TournamentSystemResource;
use App\Http\Resources\TournamentType\TournamentTypeResource;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompleteTournamentResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Tournament
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
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'place' => $this->resource->place,
            'start_date' => $this->resource->start_date,
            'end_date' => $this->resource->end_date,
            'status' => $this->resource->status,
            'total_competitors' => $this->resource->total_competitors,
            'image' => $this->whenLoaded('image', function () {
                return ImageResource::make($this->resource->image);
            }),
            'tournament_type' => $this->whenLoaded('tournamentType', function () {
                return TournamentTypeResource::make($this->resource->tournamentType);
            }),
            'devices' => $this->whenLoaded('devices', function () {
                return DeviceResource::collection($this->resource->devices);
            }),
            'games' => $this->whenLoaded('games', function () {
                return GameResource::collection($this->resource->games);
            }),
            'tournament_format' => $this->whenLoaded('tournamentFormat', function () {
                return TournamentFormatResource::make($this->resource->tournamentFormat);
            }),
            'tournament_price' => $this->whenLoaded('tournamentPrice', function () {
                return TournamentPriceResource::make($this->resource->tournamentPrice);
            }),
            'tournament_prizes' => $this->whenLoaded('tournamentPrizes', function () {
                return TournamentPrizeResource::collection($this->resource->tournamentPrizes);
            }),
            'tournament_rules' => $this->whenLoaded('tournamentRules', function () {
                return TournamentRuleResource::collection($this->resource->tournamentRules);
            }),
            'tournament_systems' => $this->whenLoaded('tournamentSystems', function () {
                return TournamentSystemResource::collection($this->resource->tournamentSystems);
            }),
            'created_by' => $this->whenLoaded('createdBy', function () {
                return PersonResource::make($this->resource->createdBy);
            }),
            'external_bracket' => $this->whenLoaded('externalBracket', function () {
                return ExternalBracketResource::make($this->resource->externalBracket);
            }),
        ];
    }
}
