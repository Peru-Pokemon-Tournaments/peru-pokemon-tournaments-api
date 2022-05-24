<?php

namespace Database\Seeders;

use App\Models\TournamentFormat;
use Illuminate\Database\Seeder;

class BaseTournamentFormatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        TournamentFormat::factory()->createMany([
            [
                'name' => 'Individuales OU',
            ],
            [
                'name' => 'Dobles OU',
            ],
            [
                'name' => 'Individuales Ubers',
            ],
            [
                'name' => 'Dobles Ubers',
            ],
            [
                'name' => 'Individuales Anything goes',
            ],
            [
                'name' => 'Dobles VGC 2008',
            ],
            [
                'name' => 'Dobles VGC 2010',
            ],
            [
                'name' => 'Dobles VGC 2011',
            ],
            [
                'name' => 'Dobles VGC 2012',
            ],
            [
                'name' => 'Dobles VGC 2013',
            ],
            [
                'name' => 'Dobles VGC 2014',
            ],
            [
                'name' => 'Dobles VGC 2015',
            ],
            [
                'name' => 'Dobles VGC 2016',
            ],
            [
                'name' => 'Dobles VGC 2017',
            ],
            [
                'name' => 'Dobles VGC 2018',
            ],
            [
                'name' => 'Dobles VGC 2019',
            ],
            [
                'name' => 'Dobles VGC 2020',
            ],
            [
                'name' => 'Dobles VGC 2021',
            ],
            [
                'name' => 'Dobles VGC 2022',
            ],
        ]);
    }
}
