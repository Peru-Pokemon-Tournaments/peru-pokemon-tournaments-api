<?php

namespace Database\Factories;

use App\Models\TournamentPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentPriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TournamentPrice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'symbol' => 'S/.',
            'amount' => $this->faker->randomNumber(2),
        ];
    }
}
