<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            UserPersonCompetitorSeeder::class,
            BaseRolesSeeder::class,
            BaseDevicesSeeder::class,
            BaseGameGenerationsAndGamesSeeder::class,
            BaseTournamentFormatsSeeder::class,
            BaseTournamentRulesSeeder::class,
            BaseTournamentSystemsSeeder::class,
            BaseTournamentTypesSeeder::class,
        ]);
    }
}
