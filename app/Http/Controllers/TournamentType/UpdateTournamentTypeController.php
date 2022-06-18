<?php

namespace App\Http\Controllers\TournamentType;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\TournamentType\UpdateTournamentTypeRequest;
use App\Http\Resources\TournamentType\TournamentTypeResource;
use App\Models\TournamentType;
use App\Services\TournamentType\UpdateTournamentTypeService;
use Illuminate\Http\Response;

class UpdateTournamentTypeController extends BasicController
{
    /**
     * The UpdateTournamentTypeService.
     *
     * @var UpdateTournamentTypeService
     */
    private UpdateTournamentTypeService $updateTournamentTypeService;

    /**
     * Create a new UpdateTournamentTypeController instance.
     *
     * @param UpdateTournamentTypeService $updateTournamentTypeService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        UpdateTournamentTypeService $updateTournamentTypeService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->updateTournamentTypeService = $updateTournamentTypeService;
    }

    /**
     * Update tournament type.
     *
     * @param TournamentType $tournamentType
     * @param UpdateTournamentTypeRequest $request
     * @return Response
     */
    public function __invoke(
        TournamentType $tournamentType,
        UpdateTournamentTypeRequest $request
    ): Response {
        $tournamentType = ($this->updateTournamentTypeService)(
            $tournamentType,
            $request->validated()
        );

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_type.update_tournament_type.ok'))
            ->setResource('tournament_type', TournamentTypeResource::make($tournamentType))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
