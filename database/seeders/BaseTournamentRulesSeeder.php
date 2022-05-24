<?php

namespace Database\Seeders;

use App\Models\TournamentRule;
use Illuminate\Database\Seeder;

class BaseTournamentRulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        TournamentRule::factory()->createMany([
            [
                'name' => 'Species Clause',
                'description' => 'Un jugador no puede tener dos Pokémon con el mismo número de la Pokédex Nacional en el equipo',
            ],
            [
                'name' => 'Sleep Clause',
                'description' => 'Si un jugador ha puesto a dormir un Pokémon de su oponente y sigue dormido, otro Pokémon no puede ser dormido',
            ],
            [
                'name' => 'Evasion Clause',
                'description' => 'Un Pokémon no puede tener Double Team o Minimize en su moveset',
            ],
            [
                'name' => 'OHKO Clause',
                'description' => 'Un Pokémon no puede tener los movimientos Fissure, Guillotine, Horn Drill o Sheer Cold en su moveset',
            ],
            [
                'name' => 'Moody Clause',
                'description' => 'Un equipo no puede tener un Pokémon con la habilidad Moody',
            ],
            [
                'name' => 'Endless Battle Clause',
                'description' => 'Los jugadores no pueden impedir intencionalmente que un rival pueda terminar el juego sin perder',
            ],
            [
                'name' => 'Baton Pass Clause',
                'description' => 'Un Pokémon no puede tener Baton Pass en su moveset',
            ],
            [
                'name' => 'Shadow Tag Clause',
                'description' => 'Un equipo no puede tener un Pokémon con la habilidad Shadow Tag',
            ],
            [
                'name' => 'Arena Trap Clause',
                'description' => 'Un equipo no puede tener un Pokémon con la habilidad Arena Trap',
            ],
            [
                'name' => 'Singles Clause',
                'description' => 'El formato del combate será individual',
            ],
            [
                'name' => 'Doubles Clause',
                'description' => 'El formato del combate será dobles',
            ],
            [
                'name' => '4 Max Allowed Pokemon Clause',
                'description' => 'El número máximo de Pokémon al momento de combatir debe ser de 4',
            ],
            [
                'name' => '6 Max Allowed Pokemon Clause',
                'description' => 'El número máximo de Pokémon al momento de combatir debe ser de 6',
            ],
            [
                'name' => 'Item Clause',
                'description' => 'Un jugador no puede tener dos o más Pokémon con el mismo objeto en el equipo',
            ],
        ]);
    }
}
