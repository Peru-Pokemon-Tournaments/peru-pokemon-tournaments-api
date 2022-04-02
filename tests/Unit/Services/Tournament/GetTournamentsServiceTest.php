<?php

namespace Tests\Unit\Services\Tournament;

use App\Models\Tournament;
use App\Repositories\TournamentRepository;
use App\Services\Tournament\GetTournamentsService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class GetTournamentsServiceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function tournaments_should_be_retrieve()
    {

        // FIXME: Needs to be mocked
        $service = new GetTournamentsService(
            new TournamentRepository()
        );

        $tournaments = Tournament::factory()->count(3)->create();

        $tournamentsTest = call_user_func($service);

        $this->assertEquals($tournaments->count(), $tournamentsTest->count());
    }
}
