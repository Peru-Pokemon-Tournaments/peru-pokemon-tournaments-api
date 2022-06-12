<?php

namespace App\Http\Controllers\Tournament;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\CreateCompleteTournamentRequest;
use App\Http\Resources\Tournament\TournamentResource;
use App\Services\Tournament\CreateCompleteTournamentService;
use Illuminate\Http\Response;

class CreateCompleteTournamentController extends BasicController
{
    /**
     * The CreateCompleteTournamentService.
     *
     * @var CreateCompleteTournamentService
     */
    private CreateCompleteTournamentService $createCompleteTournamentService;

    /**
     * Create a new instance of CreateCompleteTournamentController.
     *
     * @param CreateCompleteTournamentService $createCompleteTournamentService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreateCompleteTournamentService $createCompleteTournamentService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->createCompleteTournamentService = $createCompleteTournamentService;
    }

    /**
     * Create complete tournament.
     *
     * @param  CreateCompleteTournamentRequest $request
     * @return Response
     */
    public function __invoke(CreateCompleteTournamentRequest $request): Response
    {
        $data = $request->input();

        if ($request->has('tournament_image_file')) {
            $data['tournament_image_file'] = $request->file('tournament_image_file');
        }

        $tournament = ($this->createCompleteTournamentService)($data);

        return $this->responseBuilder
            ->setMessage(trans('endpoints.tournament.create_complete_tournament.created'))
            ->setResource('tournament', TournamentResource::make($tournament))
            ->setStatusCode(Response::HTTP_CREATED)
            ->get();
    }
}
