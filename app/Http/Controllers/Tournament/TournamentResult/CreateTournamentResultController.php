<?php

namespace App\Http\Controllers\Tournament\TournamentResult;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\Tournament\TournamentResult\CreateTournamentResultRequest;
use App\Http\Resources\TournamentResult\TournamentResultResource;
use App\Models\Tournament;
use App\Services\TournamentResult\CreateTournamentResultService;
use Illuminate\Http\Response;

class CreateTournamentResultController extends BasicController
{
    /**
     * The CreateCompleteTournamentResultService.
     *
     * @var CreateTournamentResultService
     */
    private CreateTournamentResultService $createTournamentResultService;

    /**
     * Create a new instance of CreateCompleteTournamentResultController.
     *
     * @param CreateTournamentResultService $createTournamentResultService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreateTournamentResultService $createTournamentResultService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->createTournamentResultService = $createTournamentResultService;
    }

    /**
     * Create complete tournament result.
     *
     * @param  Tournament $tournament
     * @param  CreateTournamentResultRequest $request
     * @return Response
     */
    public function __invoke(
        Tournament $tournament,
        CreateTournamentResultRequest $request
    ): Response {
        $tournamentResult = ($this->createTournamentResultService)(
            $request->input('score'),
            $request->input('place'),
            $request->input('competitor_id'),
            $tournament
        );

        $tournamentResult->load([
            'tournamentInscription.competitor',
            'tournamentInscription.pokemonShowdownTeam',
        ]);

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament.tournament_result.create_tournament_result.created'))
            ->setResource('tournament_result', TournamentResultResource::make($tournamentResult))
            ->setStatusCode(Response::HTTP_CREATED)
            ->get();
    }
}
