<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Events\TournamentInscriptionCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCompleteTournamentInscriptionRequest;
use App\Http\Resources\TournamentInscriptionResource;
use App\Models\Tournament;
use App\Services\TournamentInscription\CreateCompleteTournamentInscriptionService;
use Illuminate\Http\Response;

class CreateCompleteTournamentInscriptionController extends Controller
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
     * @return void
     */
    public function __construct(
        CreateCompleteTournamentInscriptionService $createCompleteTournamentInscriptionService
    ) {
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

        return response(
            [
                'message' => 'Inscripción creada',
                'tournament_inscription' => TournamentInscriptionResource::make($tournamentInscription),
            ],
            Response::HTTP_CREATED,
        );
    }
}
