<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Events\TournamentInscriptionStatusUpdated;
use App\Http\Controllers\BasicController;
use App\Http\Requests\UpdateTournamentInscriptionStatusRequest;
use App\Http\Resources\TournamentInscription\TournamentInscriptionResource;
use App\Models\TournamentInscription;
use App\Services\TournamentInscription\UpdateTournamentInscriptionStatusService;
use Illuminate\Http\Response;

class UpdateTournamentInscriptionStatusController extends BasicController
{
    /**
     * The CreateCompleteTournamentInscriptionService.
     *
     * @var UpdateTournamentInscriptionStatusService
     */
    private UpdateTournamentInscriptionStatusService $updateTournamentInscriptionStatusService;

    /**
     * Create a new instance of UpdateTournamentInscriptionStatusController.
     *
     * @param UpdateTournamentInscriptionStatusService $updateTournamentInscriptionStatusService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        UpdateTournamentInscriptionStatusService $updateTournamentInscriptionStatusService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->updateTournamentInscriptionStatusService = $updateTournamentInscriptionStatusService;
    }

    /**
     * Create complete tournament inscription.
     *
     * @param  TournamentInscription $tournamentInscription
     * @param  UpdateTournamentInscriptionStatusRequest $request
     * @return Response
     */
    public function __invoke(
        TournamentInscription $tournamentInscription,
        UpdateTournamentInscriptionStatusRequest $request
    ): Response {
        $tournamentInscription = ($this->updateTournamentInscriptionStatusService)(
            $tournamentInscription->id,
            $request->input('status'),
        );

        TournamentInscriptionStatusUpdated::dispatch($tournamentInscription);

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_inscription.update_tournament_inscription_status.ok'))
            ->setResource('tournament_inscription', TournamentInscriptionResource::make($tournamentInscription))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
