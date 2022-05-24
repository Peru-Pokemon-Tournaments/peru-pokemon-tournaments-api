<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Http\Controllers\Controller;
use App\Models\Competitor;
use App\Models\Tournament;
use App\Services\TournamentInscription\CheckCompetitorIsEnrolledService;
use Illuminate\Http\Response;

class IsCompetitorEnrolledToTournamentController extends Controller
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
     * @param   CheckCompetitorIsEnrolledService $checkCompetitorIsEnrolledService
     * @return  void
     */
    public function __construct(
        CheckCompetitorIsEnrolledService $checkCompetitorIsEnrolledService
    ) {
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

        return response(
            [
                'message' => ($isEnrolled
                    ? 'El competidor está inscrito'
                    : 'El competidor no está inscrito'),
                'is_enrolled' => $isEnrolled,
            ],
            Response::HTTP_OK,
        );
    }
}
