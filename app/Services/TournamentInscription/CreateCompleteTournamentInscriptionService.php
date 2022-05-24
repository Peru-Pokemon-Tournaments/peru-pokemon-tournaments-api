<?php

namespace App\Services\TournamentInscription;

use App\Contracts\Repositories\PokemonShowdownTeamRepository;
use App\Contracts\Repositories\TournamentInscriptionRepository;
use App\Models\PokemonShowdownTeam;
use App\Models\TournamentInscription;

class CreateCompleteTournamentInscriptionService
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
     * Create a new CreateCompleteTournamentInscriptionService instance.
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
     * Create a tournament inscription.
     *
     * @param string $tournamentId
     * @param string $competitorId
     * @param string $team
     * @return TournamentInscription
     */
    public function __invoke(
        string $tournamentId,
        string $competitorId,
        string $team
    ): TournamentInscription {
        $pokemonShowdownTeam = new PokemonShowdownTeam();

        $pokemonShowdownTeam->team = $team;

        $this->pokemonShowdownTeamRepository->save($pokemonShowdownTeam);

        $tournamentInscription = new TournamentInscription();

        $tournamentInscription->tournament_id = $tournamentId;
        $tournamentInscription->competitor_id = $competitorId;
        $tournamentInscription->status = TournamentInscription::PENDING;
        $tournamentInscription->pokemon_showdown_team_id = $pokemonShowdownTeam->id;

        $this->tournamentInscriptionRepository->save($tournamentInscription);

        $tournamentInscription->pokemonShowdownTeam()->associate($pokemonShowdownTeam);

        return $tournamentInscription;
    }
}
