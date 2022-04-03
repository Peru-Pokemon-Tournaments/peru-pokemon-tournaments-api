<?php

namespace App\Services\TournamentInscription;

use App\Contracts\Repositories\PokemonShowdownTeamRepository;
use App\Contracts\Repositories\TournamentInscriptionRepository;

class UpdateTournamentInscriptionService
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
     * Create a new UpdateTournamentInscriptionService instance.
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
     * Update a tournament inscription
     *
     * @param string $tournamentInscriptionId
     * @param string $team
     * @return \App\Models\TournamentInscription
     */
    public function __invoke(
        string $tournamentInscriptionId,
        string $team
    )
    {
        $tournamentInscription = $this->tournamentInscriptionRepository->findOne($tournamentInscriptionId);

        $pokemonShowdownTeam = $tournamentInscription->pokemonShowdownTeam;

        $pokemonShowdownTeam->team = $team;

        $this->pokemonShowdownTeamRepository->save($pokemonShowdownTeam);

        return $tournamentInscription;
    }
}
