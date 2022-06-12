<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Events\TournamentInscriptionUpdated;
use App\Http\Controllers\BasicController;
use App\Http\Requests\UpdateTournamentInscriptionRequest;
use App\Http\Resources\TournamentInscription\TournamentInscriptionResource;
use App\Models\TournamentInscription;
use App\Services\TournamentInscription\UpdateTournamentInscriptionService;
use Illuminate\Http\Response;

class UpdateTournamentInscriptionController extends BasicController
{
    /**
     * The CreateCompleteTournamentInscriptionService.
     *
     * @var UpdateTournamentInscriptionService
     */
    private UpdateTournamentInscriptionService $updateTournamentInscriptionService;

    /**
     * Create a new instance of UpdateTournamentInscriptionController.
     *
     * @param UpdateTournamentInscriptionService $updateTournamentInscriptionService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        UpdateTournamentInscriptionService $updateTournamentInscriptionService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->updateTournamentInscriptionService = $updateTournamentInscriptionService;
    }

    /**
     * Create complete tournament inscription.
     *
     * @param TournamentInscription $tournamentInscription
     * @param UpdateTournamentInscriptionRequest $request
     * @return Response
     */
    public function __invoke(
        TournamentInscription $tournamentInscription,
        UpdateTournamentInscriptionRequest $request
    ): Response {
        $tournamentInscription = ($this->updateTournamentInscriptionService)(
            $tournamentInscription->id,
            $request->input('pokemon_showdown_team_export'),
        );

        TournamentInscriptionUpdated::dispatch($tournamentInscription);

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_inscription.update_tournament_inscription.ok'))
            ->setResource('tournament_inscription', TournamentInscriptionResource::make($tournamentInscription))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
