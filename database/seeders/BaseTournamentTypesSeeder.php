<?php

namespace Database\Seeders;

use App\Models\TournamentType;
use Illuminate\Database\Seeder;

class BaseTournamentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        TournamentType::factory()->createMany([
            [
                'name' => 'Presencial',
            ],
            [
                'name' => 'Virtual',
            ],
        ]);
    }
}
