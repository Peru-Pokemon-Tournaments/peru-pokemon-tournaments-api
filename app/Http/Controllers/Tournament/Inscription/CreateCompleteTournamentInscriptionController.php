<?php

namespace App\Http\Controllers\Tournament\Inscription;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Events\TournamentInscriptionCreated;
use App\Http\Controllers\BasicController;
use App\Http\Requests\CreateCompleteTournamentInscriptionRequest;
use App\Http\Resources\TournamentInscriptionResource;
use App\Models\Tournament;
use App\Services\TournamentInscription\CreateCompleteTournamentInscriptionService;
use Illuminate\Http\Response;

class CreateCompleteTournamentInscriptionController extends BasicController
{
    /**
     * The CreateCompleteTournamentInscriptionService.
     *
     * @var CreateCompleteTournamentInscriptionService
     */
    private CreateCompleteTournamentInscriptionService $createCompleteTournamentInscriptionService;

    /**
     * Create a new instance of CreateCompleteTournamentInscriptionController.
     *
     * @param CreateCompleteTournamentInscriptionService $createCompleteTournamentInscriptionService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreateCompleteTournamentInscriptionService $createCompleteTournamentInscriptionService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->createCompleteTournamentInscriptionService = $createCompleteTournamentInscriptionService;
    }

    /**
     * Create complete tournament inscription.
     *
     * @param  Tournament $tournament
     * @param  CreateCompleteTournamentInscriptionRequest $request
     * @return Response
     */
    public function __invoke(
        Tournament $tournament,
        CreateCompleteTournamentInscriptionRequest $request
    ): Response {
        $tournamentInscription = ($this->createCompleteTournamentInscriptionService)(
            $tournament->id,
            $request->input('competitor_id'),
            $request->input('pokemon_showdown_team_export'),
        );

        TournamentInscriptionCreated::dispatch($tournamentInscription);

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament.inscription.create_complete_tournament_inscription.created'))
            ->setResource('tournament_inscription', TournamentInscriptionResource::make($tournamentInscription))
            ->setStatusCode(Response::HTTP_CREATED)
            ->get();
    }
}
