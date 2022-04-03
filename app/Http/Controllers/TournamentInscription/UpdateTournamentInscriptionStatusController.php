<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Events\TournamentInscriptionStatusUpdated;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTournamentInscriptionStatusRequest;
use App\Http\Resources\TournamentInscriptionResource;
use App\Models\TournamentInscription;
use App\Services\TournamentInscription\UpdateTournamentInscriptionStatusService;
use Illuminate\Http\Response;

class UpdateTournamentInscriptionStatusController extends Controller
{
    /**
     * The CreateCompleteTournamentInscriptionService
     *
     * @var UpdateTournamentInscriptionStatusService
     */
    private UpdateTournamentInscriptionStatusService $updateTournamentInscriptionStatusService;

    /**
     * Create a new instance of UpdateTournamentInscriptionStatusController
     *
     * @param   UpdateTournamentInscriptionStatusService $updateTournamentInscriptionStatusService
     * @return  void
     */
    public function __construct(
        UpdateTournamentInscriptionStatusService $updateTournamentInscriptionStatusService
    )
    {
        $this->updateTournamentInscriptionStatusService = $updateTournamentInscriptionStatusService;
    }

    /**
     * Create complete tournament inscription
     *
     * @param  TournamentInscription $tournamentInscription
     * @param  UpdateTournamentInscriptionStatusRequest $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function __invoke(
        TournamentInscription $tournamentInscription,
        UpdateTournamentInscriptionStatusRequest $request
    )
    {
        $tournamentInscription = ($this->updateTournamentInscriptionStatusService)(
            $tournamentInscription->id,
            $request->input('status'),
        );

        TournamentInscriptionStatusUpdated::dispatch($tournamentInscription);

        return response(
            [
                'message' => 'Estado de inscripción actualizada',
                'tournament_inscription' =>
                    TournamentInscriptionResource::make($tournamentInscription),
            ],
            Response::HTTP_OK,
        );
    }
}
