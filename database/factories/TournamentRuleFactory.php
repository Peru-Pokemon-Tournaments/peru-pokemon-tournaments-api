<?php

namespace Database\Factories;

use App\Models\TournamentRule;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentRuleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TournamentRule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text('10'),
            'description' => $this->faker->text('10'),
        ];
    }
}
