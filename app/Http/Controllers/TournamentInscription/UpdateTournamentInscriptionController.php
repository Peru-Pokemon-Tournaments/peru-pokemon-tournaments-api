<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Events\TournamentInscriptionUpdated;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCompleteTournamentInscriptionRequest;
use App\Http\Requests\UpdateTournamentInscriptionRequest;
use App\Http\Resources\TournamentInscriptionResource;
use App\Models\Tournament;
use App\Models\TournamentInscription;
use App\Services\TournamentInscription\UpdateTournamentInscriptionService;
use Illuminate\Http\Response;

class UpdateTournamentInscriptionController extends Controller
{
    /**
     * The CreateCompleteTournamentInscriptionService
     *
     * @var UpdateTournamentInscriptionService
     */
    private UpdateTournamentInscriptionService $updateTournamentInscriptionService;

    /**
     * Create a new instance of UpdateTournamentInscriptionController
     *
     * @param   UpdateTournamentInscriptionService $updateTournamentInscriptionService
     * @return  void
     */
    public function __construct(
        UpdateTournamentInscriptionService $updateTournamentInscriptionService
    )
    {
        $this->updateTournamentInscriptionService = $updateTournamentInscriptionService;
    }

    /**
     * Create complete tournament inscription
     *
     * @param  Tournament $tournament
     * @param  CreateCompleteTournamentInscriptionRequest $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function __invoke(
        TournamentInscription $tournamentInscription,
        UpdateTournamentInscriptionRequest $request
    )
    {
        $tournamentInscription = ($this->updateTournamentInscriptionService)(
            $tournamentInscription->id,
            $request->input('pokemon_showdown_team_export'),
        );

        TournamentInscriptionUpdated::dispatch($tournamentInscription);

        return response(
            [
                'message' => 'Inscripción actualizada',
                'tournament_inscription' =>
                    TournamentInscriptionResource::make($tournamentInscription),
            ],
            Response::HTTP_OK,
        );
    }
}
