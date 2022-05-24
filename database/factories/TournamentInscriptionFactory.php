<?php

namespace Database\Factories;

use App\Models\TournamentInscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentInscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TournamentInscription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'status' => 'pending',
        ];
    }
}
