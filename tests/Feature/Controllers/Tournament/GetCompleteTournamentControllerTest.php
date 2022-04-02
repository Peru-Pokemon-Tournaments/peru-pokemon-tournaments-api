<?php

namespace Tests\Feature\Controllers\Tournament;

use App\Models\Tournament;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GetCompleteTournamentControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function a_complete_tournament_should_be_received()
    {
        $tournament = Tournament::factory()->create();

        $response = $this->get('/api/tournaments/' . $tournament->id);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('message')
                ->has('tournament')
                ->where('tournament.id', $tournament->id)
                ->missing('errors')
        );
    }
}
