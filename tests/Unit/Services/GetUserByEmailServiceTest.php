<?php

namespace Tests\Unit\Services;

use App\Models\Person;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\User\GetUserByEmailService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class GetUserByEmailServiceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function an_user_should_be_login()
    {
        // FIXME: Needs to be mocked
        $service = new GetUserByEmailService(
            new UserRepository()
        );
        $email = 'ignacior@example.test';

        $person = Person::factory()->create();

        $user = User::factory()->create([
            'email' => $email,
            'person_id' => $person->id,
        ]);

        $user = ($service)($user->email);

        $this->assertNotEmpty($user);
        $this->assertEquals($email, $user->email);
    }
}
