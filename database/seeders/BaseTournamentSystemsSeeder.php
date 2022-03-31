<?php

namespace Database\Seeders;

use App\Models\TournamentSystem;
use Illuminate\Database\Seeder;

class BaseTournamentSystemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TournamentSystem::factory()->createMany([
            [
                'name' => 'Rondas Suizas',
                'description' => 'En un torneo por sistema suizo se persigue clasificar a todos los participantes según su respectiva actuación, mediante un ordenado procedimiento de filtración a lo largo de un número de rondas o encuentros. El principio básico de funcionamiento consiste en enfrentar a cada competidor con un oponente de su misma puntuación en cada ronda. Si no es posible asignar un oponente de su misma puntuación se le buscará alguien que tenga la puntuación más cercana',
            ],
            [
                'name' => 'Rondas Eliminatorias',
                'description' => 'Consiste en que el perdedor de un encuentro queda inmediatamente eliminado de la competición, mientras que el ganador avanza a la siguiente fase.'
            ]
        ]);
    }
}
