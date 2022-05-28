<?php

namespace App\Http\Controllers\Tournament\Competitor\Inscription;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Models\Competitor;
use App\Models\Tournament;
use App\Services\TournamentInscription\DeleteTournamentInscriptionService;
use App\Services\TournamentInscription\GetTournamentInscriptionByCompetitorTournamentService;
use Illuminate\Http\Response;

class DeleteCompetitorTournamentInscriptionController extends BasicController
{
    /**
     * The DeleteTournamentInscriptionService.
     *
     * @var DeleteTournamentInscriptionService
     */
    private DeleteTournamentInscriptionService $deleteInscriptionService;

    /**
     * The GetCompetitorTournamentInscriptionController.
     *
     * @var GetTournamentInscriptionByCompetitorTournamentService
     */
    private GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService;

    /**
     * Create a new instance of DeleteTournamentInscriptionController.
     *
     * @param DeleteTournamentInscriptionService $deleteInscriptionService
     * @param GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        DeleteTournamentInscriptionService $deleteInscriptionService,
        GetTournamentInscriptionByCompetitorTournamentService $getInscriptionService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->deleteInscriptionService = $deleteInscriptionService;
        $this->getInscriptionService = $getInscriptionService;
    }

    /**
     * Delete tournament inscription.
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

        $isDeleted = ($this->deleteInscriptionService)(
            $tournamentInscription->id
        );

        return $this->responseBuilder
            ->when(
                $isDeleted,
                fn (ResponseBuilder $builder) => $builder->setMessage(
                    trans('endpoints.tournament.competitor.inscription.delete_competitor_tournament_inscription.ok')
                ),
                fn (ResponseBuilder $builder) => $builder->setMessage(
                    trans('endpoints.tournament.competitor.inscription.delete_competitor_tournament_inscription.not_found')
                )
            )
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
