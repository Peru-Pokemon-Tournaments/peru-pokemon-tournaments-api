<?php

namespace Tests\Feature\Controllers\Tournament;

use App\Models\Device;
use App\Models\Game;
use App\Models\GameGeneration;
use App\Models\Person;
use App\Models\TournamentFormat;
use App\Models\TournamentRule;
use App\Models\TournamentSystem;
use App\Models\TournamentType;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Arr;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CreateCompleteTournamentControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function a_complete_tournament_should_be_created()
    {
        $person = Person::factory()->create();
        $tournamentType = TournamentType::factory()->create();
        $tournamentFormat = TournamentFormat::factory()->create();
        $generation = GameGeneration::factory()->create([
            'generation' => '1',
        ]);
        $games = Game::factory()->count(2)->create([
            'game_generation_id' => $generation->id,
        ]);
        $devices = Device::factory()->count(3)->create();
        $tournamentSystems = TournamentSystem::factory()->count(1)->create();
        $tournamentRules = TournamentRule::factory()->count(2)->create();

        $data = [
            'title' => 'Some tournament',
            'description' => 'some description',
            'place' => 'Some place',
            'start_date' => '2022-01-01 08:08:00',
            'end_date' => '2022-02-02 08:08:00',
            'created_by_person' => [
                'id' => $person->id,
            ],
            'tournament_type' => [
                'id' => $tournamentType->id,
            ],
            'tournament_format' => [
                'id' => $tournamentFormat->id,
            ],
            'tournament_price' => [
                'symbol' => 'S/.',
                'amount' => 5.1,
            ],
            'tournament_prizes' => [
                [
                    'title' => 'Amiibo Samus',
                    'description' => 'Un amibo de Samus',
                ],
                [
                    'title' => '10 Soles',
                    'description' => '10 soles vía yape',
                ],
            ],
            'external_bracket' => [
                'reference' => 'challonge',
                'url' => 'https://test.com.pe/1234',
            ],
            'games' => $games->toArray(),
            'devices' => $devices->toArray(),
            'tournament_systems' => $tournamentSystems->toArray(),
            'tournament_rules' => $tournamentRules->toArray(),
        ];

        $response = $this->post('/api/tournaments', $data);

        $response->assertStatus(201);
        $response->assertJson(
            fn (AssertableJson $json) => $json->has('message')
                ->has('tournament')
                ->has('tournament.id')
                ->has('tournament.title')
                ->has('tournament.description')
                ->has('tournament.place')
                ->has('tournament.start_date')
                ->has('tournament.end_date')
                ->has('tournament.tournament_type')
                ->has('tournament.devices')
                ->has('tournament.games')
                ->has('tournament.tournament_format')
                ->has('tournament.tournament_price')
                ->has('tournament.tournament_prizes')
                ->has('tournament.tournament_rules')
                ->has('tournament.tournament_systems')
                ->has('tournament.external_bracket')
                ->where('tournament.title', Arr::get($data, 'title'))
                ->where('tournament.description', Arr::get($data, 'description'))
                ->where('tournament.place', Arr::get($data, 'place'))
                ->where('tournament.start_date', Arr::get($data, 'start_date'))
                ->where('tournament.end_date', Arr::get($data, 'end_date'))
                ->where('tournament.tournament_type.id', Arr::get($data, 'tournament_type.id'))
                ->count('tournament.devices', count(Arr::get($data, 'devices')))
                ->where('tournament.devices.0.id', Arr::get($data, 'devices.0.id'))
                ->where('tournament.devices.1.id', Arr::get($data, 'devices.1.id'))
                ->where('tournament.devices.2.id', Arr::get($data, 'devices.2.id'))
                ->count('tournament.games', count(Arr::get($data, 'games')))
                ->where('tournament.games.0.id', Arr::get($data, 'games.0.id'))
                ->where('tournament.games.1.id', Arr::get($data, 'games.1.id'))
                ->where('tournament.tournament_format.id', Arr::get($data, 'tournament_format.id'))
                ->has('tournament.tournament_price.id')
                ->where('tournament.tournament_price.symbol', Arr::get($data, 'tournament_price.symbol'))
                ->where('tournament.tournament_price.amount', Arr::get($data, 'tournament_price.amount'))
                ->count('tournament.tournament_prizes', count(Arr::get($data, 'tournament_prizes')))
                //->where('tournament.tournament_prizes.0.title', Arr::get($data, 'tournament_prizes.0.title'))
                //->where('tournament.tournament_prizes.1.title', Arr::get($data, 'tournament_prizes.1.title'))
                //->where('tournament.tournament_prizes.0.description', Arr::get($data, 'tournament_prizes.0.description'))
                //->where('tournament.tournament_prizes.1.description', Arr::get($data, 'tournament_prizes.1.description'))
                ->where('tournament.external_bracket.reference', Arr::get($data, 'external_bracket.reference'))
                ->where('tournament.external_bracket.url', Arr::get($data, 'external_bracket.url'))
                ->count('tournament.tournament_systems', count(Arr::get($data, 'tournament_systems')))
                //->where('tournament.tournament_systems.0.id', Arr::get($data, 'tournament_systems.0.id'))
                ->count('tournament.tournament_rules', count(Arr::get($data, 'tournament_rules')))
                //->where('tournament.tournament_rules.0.id', Arr::get($data, 'tournament_rules.0.id'))
                //->where('tournament.tournament_rules.1.id', Arr::get($data, 'tournament_rules.1.id'))
                ->missing('errors')
        );
    }
}
