<?php

namespace App\Services\TournamentInscription;

use App\Contracts\Repositories\PokemonShowdownTeamRepository;
use App\Contracts\Repositories\TournamentInscriptionRepository;

class DeleteTournamentInscriptionService
{
    /**
     * Tournament Inscription Repository
     *
     * @var App\Contracts\Repositories\TournamentInscriptionRepository
     */
    private TournamentInscriptionRepository $tournamentInscriptionRepository;

    /**
     * Pokemon Showdown Team Repository
     *
     * @var App\Contracts\Repositories\PokemonShowdownTeamRepository
     */
    private PokemonShowdownTeamRepository $pokemonShowdownTeamRepository;

    /**
     * Create a new DeleteTournamentInscriptionService instance.
     *
     * @param   TournamentInscriptionRepository $tournamentInscriptionRepository
     * @param   PokemonShowdownTeamRepository $pokemonShowdownTeamRepository
     * @return void
     */
    public function __construct(
        TournamentInscriptionRepository $tournamentInscriptionRepository,
        PokemonShowdownTeamRepository $pokemonShowdownTeamRepository
    )
    {
        $this->tournamentInscriptionRepository = $tournamentInscriptionRepository;
        $this->pokemonShowdownTeamRepository = $pokemonShowdownTeamRepository;
    }

    /**
     * Delete tournament inscription
     *
     * @param string $tournamentInscriptionId
     * @return bool
     */
    public function __invoke(
        string $tournamentInscriptionId
    )
    {
        $tournamentInscription = $this->tournamentInscriptionRepository->findOne($tournamentInscriptionId);

        $pokemonShowdownTeamId = $tournamentInscription->pokemonShowdownTeam->id;

        return (
            $this->tournamentInscriptionRepository->delete($tournamentInscriptionId) &&
            $this->pokemonShowdownTeamRepository->delete($pokemonShowdownTeamId)
        );
    }
}
