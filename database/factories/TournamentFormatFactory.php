<?php

namespace Database\Factories;

use App\Models\TournamentFormat;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentFormatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TournamentFormat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(10),
        ];
    }
}
