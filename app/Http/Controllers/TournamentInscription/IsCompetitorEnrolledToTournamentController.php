<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Models\Competitor;
use App\Models\Tournament;
use App\Services\TournamentInscription\CheckCompetitorIsEnrolledService;
use Illuminate\Http\Response;

class IsCompetitorEnrolledToTournamentController extends BasicController
{
    /**
     * The CheckCompetitorIsEnrolledService.
     *
     * @var CheckCompetitorIsEnrolledService
     */
    private CheckCompetitorIsEnrolledService $checkCompetitorIsEnrolledService;

    /**
     * Create a new instance of IsCompetitorEnrolledToTournamentController.
     *
     * @param CheckCompetitorIsEnrolledService $checkCompetitorIsEnrolledService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CheckCompetitorIsEnrolledService $checkCompetitorIsEnrolledService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->checkCompetitorIsEnrolledService = $checkCompetitorIsEnrolledService;
    }

    /**
     * Retrieve tournament inscription.
     *
     * @param Tournament $tournament
     * @param Competitor $competitor
     * @return Response
     */
    public function __invoke(
        Tournament $tournament,
        Competitor $competitor
    ): Response {
        $isEnrolled = ($this->checkCompetitorIsEnrolledService)(
            $tournament->id,
            $competitor->id
        );

        return $this->responseBuilder
            ->when(
                $isEnrolled,
                fn (ResponseBuilder $builder) => $builder->setMessage('El competidor está incrito'),
                fn (ResponseBuilder $builder) => $builder->setMessage('El competidor no está inscrito')
            )
            ->setResource('is_enrolled', $isEnrolled)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
