<?php

namespace App\Services\TournamentInscription;

use App\Contracts\Repositories\PokemonShowdownTeamRepository;
use App\Contracts\Repositories\TournamentInscriptionRepository;
use App\Models\TournamentInscription;
use Illuminate\Database\Eloquent\Model;

class UpdateTournamentInscriptionService
{
    /**
     * Tournament Inscription Repository.
     *
     * @var TournamentInscriptionRepository
     */
    private TournamentInscriptionRepository $tournamentInscriptionRepository;

    /**
     * Pokémon Showdown Team Repository.
     *
     * @var PokemonShowdownTeamRepository
     */
    private PokemonShowdownTeamRepository $pokemonShowdownTeamRepository;

    /**
     * Create a new UpdateTournamentInscriptionService instance.
     *
     * @param TournamentInscriptionRepository $tournamentInscriptionRepository
     * @param PokemonShowdownTeamRepository $pokemonShowdownTeamRepository
     * @return void
     */
    public function __construct(
        TournamentInscriptionRepository $tournamentInscriptionRepository,
        PokemonShowdownTeamRepository $pokemonShowdownTeamRepository
    ) {
        $this->tournamentInscriptionRepository = $tournamentInscriptionRepository;
        $this->pokemonShowdownTeamRepository = $pokemonShowdownTeamRepository;
    }

    /**
     * Update a tournament inscription.
     *
     * @param string $tournamentInscriptionId
     * @param string $team
     * @return TournamentInscription|Model|null
     */
    public function __invoke(
        string $tournamentInscriptionId,
        string $team
    ): ?TournamentInscription {
        $tournamentInscription = $this->tournamentInscriptionRepository->findOne($tournamentInscriptionId);

        $pokemonShowdownTeam = $tournamentInscription->pokemonShowdownTeam;

        $pokemonShowdownTeam->team = $team;

        $this->pokemonShowdownTeamRepository->save($pokemonShowdownTeam);

        $tournamentInscription->status = TournamentInscription::PENDING;

        $this->tournamentInscriptionRepository->save($tournamentInscription);

        return $tournamentInscription;
    }
}
