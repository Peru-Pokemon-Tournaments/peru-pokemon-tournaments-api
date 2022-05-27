<?php

namespace App\Http\Controllers\TournamentInscription;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Models\TournamentInscription;
use App\Services\TournamentInscription\DeleteTournamentInscriptionService;
use Illuminate\Http\Response;

class DeleteTournamentInscriptionController extends BasicController
{
    /**
     * The DeleteTournamentInscriptionService.
     *
     * @var DeleteTournamentInscriptionService
     */
    private DeleteTournamentInscriptionService $deleteTournamentInscriptionService;

    /**
     * Create a new instance of DeleteTournamentInscriptionController.
     *
     * @param DeleteTournamentInscriptionService $deleteTournamentInscriptionService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        DeleteTournamentInscriptionService $deleteTournamentInscriptionService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->deleteTournamentInscriptionService = $deleteTournamentInscriptionService;
    }

    /**
     * Delete tournament inscription.
     *
     * @param TournamentInscription $tournamentInscription
     * @return Response
     */
    public function __invoke(
        TournamentInscription $tournamentInscription
    ): Response {
        $isDeleted = ($this->deleteTournamentInscriptionService)(
            $tournamentInscription->id
        );

        return $this->responseBuilder
            ->when(
                $isDeleted,
                fn (ResponseBuilder $builder) => $builder->setMessage('Se eliminó la inscripción')
                        ->setStatusCode(Response::HTTP_OK),
                fn (ResponseBuilder $builder) => $builder->setMessage('No se eliminó la inscripción')
                        ->setStatusCode(Response::HTTP_NOT_FOUND)
            )
            ->get();
    }
}
