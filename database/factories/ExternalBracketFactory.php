<?php

namespace Database\Factories;

use App\Models\ExternalBracket;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExternalBracketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExternalBracket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'reference' => $this->faker->text(10),
            'url' => $this->faker->url(),
        ];
    }
}
