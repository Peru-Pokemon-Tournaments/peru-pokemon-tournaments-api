<?php

namespace Database\Factories;

use App\Models\TournamentResult;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentResultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TournamentResult::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'place' => $this->faker->randomNumber(),
            'score' => $this->faker->randomNumber(2),
        ];
    }
}
