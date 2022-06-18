<?php

namespace App\Http\Controllers\TournamentSystem;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\TournamentSystem\UpdateTournamentSystemRequest;
use App\Http\Resources\TournamentSystem\TournamentSystemResource;
use App\Models\TournamentSystem;
use App\Services\TournamentSystem\UpdateTournamentSystemService;
use Illuminate\Http\Response;

class UpdateTournamentSystemController extends BasicController
{
    /**
     * The UpdateTournamentSystemService.
     *
     * @var UpdateTournamentSystemService
     */
    private UpdateTournamentSystemService $updateTournamentSystemService;

    /**
     * Create a new UpdateTournamentSystemController instance.
     *
     * @param UpdateTournamentSystemService $updateTournamentSystemService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        UpdateTournamentSystemService $updateTournamentSystemService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->updateTournamentSystemService = $updateTournamentSystemService;
    }

    /**
     * Update tournament system.
     *
     * @param TournamentSystem $tournamentSystem
     * @param UpdateTournamentSystemRequest $request
     * @return Response
     */
    public function __invoke(
        TournamentSystem $tournamentSystem,
        UpdateTournamentSystemRequest $request
    ): Response {
        $tournamentSystem = ($this->updateTournamentSystemService)(
            $tournamentSystem,
            $request->validated()
        );

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament_system.update_tournament_system.ok'))
            ->setResource('tournament_system', TournamentSystemResource::make($tournamentSystem))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
