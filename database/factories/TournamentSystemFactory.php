<?php

namespace Database\Factories;

use App\Models\TournamentSystem;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentSystemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TournamentSystem::class;

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
