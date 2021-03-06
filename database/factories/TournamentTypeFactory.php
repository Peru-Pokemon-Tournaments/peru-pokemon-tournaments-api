<?php

namespace Database\Factories;

use App\Models\TournamentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TournamentType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(20),
        ];
    }
}
