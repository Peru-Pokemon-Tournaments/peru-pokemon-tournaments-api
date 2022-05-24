<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GameGeneration;
use Illuminate\Database\Seeder;

class BaseGameGenerationsAndGamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $gameGenerations = GameGeneration::factory()->createMany([
            [
                'generation' => '1',
                'description' => 'Primera Generación',
            ],
            [
                'generation' => '2',
                'description' => 'Segunda Generación',
            ],
            [
                'generation' => '3',
                'description' => 'Tercera Generación',
            ],
            [
                'generation' => '4',
                'description' => 'Cuarta Generación',
            ],
            [
                'generation' => '5',
                'description' => 'Quinta Generación',
            ],
            [
                'generation' => '6',
                'description' => 'Sexta Generación',
            ],
            [
                'generation' => '7',
                'description' => 'Séptima Generación',
            ],
            [
                'generation' => '8',
                'description' => 'Octava Generación',
            ],
        ]);

        Game::factory()->createMany([
            [
                'name' => 'Pokemon Rojo',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '1'),
            ],
            [
                'name' => 'Pokemon Verde',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '1'),
            ],
            [
                'name' => 'Pokemon Azul',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '1'),
            ],
            [
                'name' => 'Pokemon Oro',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '2'),
            ],
            [
                'name' => 'Pokemon Plata',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '2'),
            ],
            [
                'name' => 'Pokemon Rubí',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '3'),
            ],
            [
                'name' => 'Pokemon Zafiro',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '3'),
            ],
            [
                'name' => 'Pokemon Esmeralda',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '3'),
            ],
            [
                'name' => 'Pokemon Rojo Fuego',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '3'),
            ],
            [
                'name' => 'Pokemon Verde Hoja',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '3'),
            ],
            [
                'name' => 'Pokemon Diamante',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '4'),
            ],
            [
                'name' => 'Pokemon Perla',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '4'),
            ],
            [
                'name' => 'Pokemon Platino',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '4'),
            ],
            [
                'name' => 'Pokemon Oro Corazón',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '4'),
            ],
            [
                'name' => 'Pokemon Alma Plata',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '4'),
            ],
            [
                'name' => 'Pokemon Blanco',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '5'),
            ],
            [
                'name' => 'Pokemon Negro',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '5'),
            ],
            [
                'name' => 'Pokemon Blanco 2',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '5'),
            ],
            [
                'name' => 'Pokemon Negro 2',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '5'),
            ],
            [
                'name' => 'Pokemon X',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '6'),
            ],
            [
                'name' => 'Pokemon Y',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '6'),
            ],
            [
                'name' => 'Pokemon Rubí Omega',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '6'),
            ],
            [
                'name' => 'Pokemon Zafiro Alfa',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '6'),
            ],
            [
                'name' => 'Pokemon Sol',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '7'),
            ],
            [
                'name' => 'Pokemon Luna',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '7'),
            ],
            [
                'name' => 'Pokemon Ultra Sol',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '7'),
            ],
            [
                'name' => 'Pokemon Ultra Luna',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '7'),
            ],
            [
                'name' => 'Pokemon Espada',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '8'),
            ],
            [
                'name' => 'Pokemon Escudo',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '8'),
            ],
            [
                'name' => 'Pokemon Lets Go Pikachu',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '7'),
            ],
            [
                'name' => 'Pokemon Lets Go Eevee',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '7'),
            ],
            [
                'name' => 'Pokemon GO',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '7'),
            ],
            [
                'name' => 'Pokemon Diamante Brillante',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '8'),
            ],
            [
                'name' => 'Pokemon Perla Reluciente',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '8'),
            ],
            [
                'name' => 'Pokemon Stadium',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '1'),
            ],
            [
                'name' => 'Pokemon Stadium 2',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '2'),
            ],
            [
                'name' => 'Pokemon Colloseum',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '3'),
            ],
            [
                'name' => 'Pokemon XD',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '3'),
            ],
            [
                'name' => 'Pokemon Battle Revolution',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '4'),
            ],
            [
                'name' => 'Pokemon Unite',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '8'),
            ],
            [
                'name' => 'Pokemon Pokken Tournament',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '7'),
            ],
            [
                'name' => 'Pokemon TCG',
                'game_generation_id' => $gameGenerations->firstWhere('generation', '7'),
            ],
        ]);
    }
}
