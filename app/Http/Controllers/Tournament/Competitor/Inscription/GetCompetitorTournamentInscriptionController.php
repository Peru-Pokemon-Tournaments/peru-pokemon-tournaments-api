<?php

namespace App\Http\Controllers\Tournament\Competitor\Inscription;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Resources\TournamentInscription\TournamentInscriptionResource;
use App\Models\Competitor;
use App\Models\Tournament;
use App\Services\TournamentInscription\GetTournamentInscriptionByCompetitorTournamentService;
use Illuminate\Http\Response;

class GetCompetitorTournamentInscriptionController extends BasicController
{
    /**
     * The GetCompetitorTournamentInscriptionController.
     *
     * @var GetTournamentInscriptionByCompetitorTournamentService
     */
    private GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService;

    /**
     * Create a new instance of GetCompetitorTournamentInscriptionController.
     *
     * @param GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->getInscriptionService = $getInscriptionService;
    }

    /**
     * Get tournament inscription.
     *
     * @param Tournament $tournament
     * @param Competitor $competitor
     * @return Response
     */
    public function __invoke(
        Tournament $tournament,
        Competitor $competitor
    ): Response {
        $tournamentInscription = ($this->getInscriptionService)(
            $competitor->id,
            $tournament->id
        );

        $tournamentInscription->load([
            'competitor',
            'pokemonShowdownTeam',
        ]);

        return $this->responseBuilder
            ->setMessage(
                trans('endpoints.tournament.competitor.inscription.get_competitor_tournament_inscription.ok')
            )
            ->setResource('tournament_inscription', TournamentInscriptionResource::make($tournamentInscription))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
