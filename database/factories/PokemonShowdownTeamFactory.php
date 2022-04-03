<?php

namespace Database\Factories;

use App\Models\Device;
use App\Models\PokemonShowdownTeam;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonShowdownTeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PokemonShowdownTeam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'team' => $this->faker->text(100),
        ];
    }
}
