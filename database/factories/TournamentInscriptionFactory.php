<?php

namespace Database\Factories;

use App\Models\Device;
use App\Models\PokemonShowdownTeam;
use App\Models\TournamentInscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentInscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TournamentInscription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => 'pending',
        ];
    }
}
