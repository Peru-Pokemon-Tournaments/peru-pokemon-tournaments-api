<?php

namespace Database\Factories;

use App\Models\TournamentPrize;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentPrizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TournamentPrize::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(20),
        ];
    }
}
