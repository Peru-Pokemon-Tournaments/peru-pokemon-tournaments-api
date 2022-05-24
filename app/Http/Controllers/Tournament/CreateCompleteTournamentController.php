<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCompleteTournamentRequest;
use App\Http\Resources\CompleteTournamentResource;
use App\Services\Tournament\CreateCompleteTournamentService;
use Illuminate\Http\Response;

class CreateCompleteTournamentController extends Controller
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
     * @param   CreateCompleteTournamentService $createCompleteTournamentService
     * @return  void
     */
    public function __construct(
        CreateCompleteTournamentService $createCompleteTournamentService
    ) {
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

        return response(
            [
                'message' => 'Torneo creado',
                'tournament' => CompleteTournamentResource::make($tournament),
            ],
            Response::HTTP_CREATED,
        );
    }
}
