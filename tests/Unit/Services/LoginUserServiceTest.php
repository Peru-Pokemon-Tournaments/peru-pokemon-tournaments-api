<?php

namespace Tests\Unit\Services;

use App\Models\Person;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\User\LoginUserService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginUserServiceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function an_user_should_be_login()
    {
        // FIXME: Needs to be mocked
        $service = new LoginUserService(
            new UserRepository()
        );

        $unhashedPassword = 'somepassword2022';

        $person = Person::factory()->create();

        $user = User::factory()->create([
            'email' => 'ignacior@example.test',
            'password' => Hash::make($unhashedPassword),
            'person_id' => $person->id,
        ]);

        $tokenOrFalse = ($service)($user->email, $unhashedPassword);

        $this->assertNotEmpty($tokenOrFalse);
        $this->assertIsNotBool($tokenOrFalse);
    }
}
