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
     * The CheckCompetitorIsEnrolledService
     *
     * @var CheckCompetitorIsEnrolledService
     */
    private CheckCompetitorIsEnrolledService $checkCompetitorIsEnrolledService;

    /**
     * Create a new instance of IsCompetitorEnrolledToTournamentController
     *
     * @param   CheckCompetitorIsEnrolledService $checkCompetitorIsEnrolledService
     * @return  void
     */
    public function __construct(
        CheckCompetitorIsEnrolledService $checkCompetitorIsEnrolledService
    )
    {
        $this->checkCompetitorIsEnrolledService = $checkCompetitorIsEnrolledService;
    }

    /**
     * Retrieve tournament inscription
     *
     * @param  \App\Models\Tournament $tournament
     * @param  \App\Models\Competitor $competitor
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function __invoke(
        Tournament $tournament,
        Competitor $competitor
    )
    {
        $isEnrolled = ($this->checkCompetitorIsEnrolledService)(
            $tournament->id,
            $competitor->id
        );

        return response(
            [
                'message' => ($isEnrolled
                    ?  'El competidor está inscrito'
                    : 'El competidor no está inscrito'),
                'is_enrolled' => $isEnrolled,
            ],
            Response::HTTP_OK,
        );
    }
}
