<?php

namespace Database\Factories;

use App\Models\GameGeneration;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameGenerationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GameGeneration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'generation' => $this->faker->randomNumber(),
            'description' => $this->faker->text('20'),
        ];
    }
}
