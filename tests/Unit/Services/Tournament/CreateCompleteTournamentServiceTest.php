<?php

namespace Tests\Unit\Services\Tournament;

use App\Models\Device;
use App\Models\Game;
use App\Models\GameGeneration;
use App\Models\Person;
use App\Models\TournamentFormat;
use App\Models\TournamentRule;
use App\Models\TournamentSystem;
use App\Models\TournamentType;
use App\Repositories\ExternalBracketRepository;
use App\Repositories\GoogleDriveFileRepository;
use App\Repositories\ImageRepository;
use App\Repositories\TournamentPriceRepository;
use App\Repositories\TournamentPrizeRepository;
use App\Repositories\TournamentRepository;
use App\Services\Tournament\CreateCompleteTournamentService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Arr;
use Tests\TestCase;

class CreateCompleteTournamentServiceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function a_complete_tournament_should_be_created()
    {

        // FIXME: Needs to be mocked
        $service = new CreateCompleteTournamentService(
            new TournamentRepository(),
            new ExternalBracketRepository(),
            new TournamentPriceRepository(),
            new TournamentPrizeRepository(),
            new ImageRepository(),
            new GoogleDriveFileRepository()
        );

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
        $tournamentRules = TournamentRule::factory()->count(6)->create();

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
                'amount' => 5.0,
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
                'url' => 'https://test.com.pe/1234'
            ],
            'tournament_image_file' => null,
            'games' => $games->toArray(),
            'devices' => $devices->toArray(),
            'tournament_systems' => $tournamentSystems->toArray(),
            'tournament_rules' => $tournamentRules->toArray(),
        ];

        $tournament = call_user_func($service, $data);

        $this->assertEquals(Arr::get($data, 'title'), $tournament->title);
        $this->assertEquals(Arr::get($data, 'description'), $tournament->description);
        $this->assertEquals(Arr::get($data, 'place'), $tournament->place);
        $this->assertEquals(Arr::get($data, 'start_date'), $tournament->start_date);
        $this->assertEquals(Arr::get($data, 'end_date'), $tournament->end_date);
        $this->assertEquals(Arr::get($data, 'created_by_person.id'), $tournament->created_by_person_id);
        $this->assertEquals(Arr::get($data, 'tournament_type.id'), $tournament->tournament_type_id);
        $this->assertEquals(Arr::get($data, 'tournament_format.id'), $tournament->tournament_format_id);
        $this->assertEquals(Arr::get($data, 'tournament_price.symbol'), $tournament->tournamentPrice->symbol);
        $this->assertEquals(Arr::get($data, 'tournament_price.amount'), $tournament->tournamentPrice->amount);
        $this->assertCount(count(Arr::get($data, 'tournament_prizes')), $tournament->tournamentPrizes);
        $this->assertEquals(Arr::get($data, 'external_bracket.reference'), $tournament->externalBracket->reference);
        $this->assertEquals(Arr::get($data, 'external_bracket.url'), $tournament->externalBracket->url);
        $this->assertCount(count(Arr::get($data, 'games')), $tournament->games);
        $this->assertCount(count(Arr::get($data, 'devices')), $tournament->devices);
        $this->assertCount(count(Arr::get($data, 'tournament_systems')), $tournament->tournamentSystems);
        $this->assertCount(count(Arr::get($data, 'tournament_rules')), $tournament->tournamentRules);
        $this->assertEmpty($tournament->image);
    }
}
