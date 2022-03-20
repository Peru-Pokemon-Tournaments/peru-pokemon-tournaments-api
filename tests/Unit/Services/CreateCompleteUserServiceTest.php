<?php

namespace Tests\Unit\Services;

use App\Repositories\CompetitorRepository;
use App\Repositories\PersonRepository;
use App\Repositories\UserRepository;
use App\Services\User\CreateCompleteUserService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreateCompleteUserServiceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function a_complete_user_should_be_created()
    {
        // FIXME: Needs to be mocked
        $service = new CreateCompleteUserService(
            new CompetitorRepository(),
            new PersonRepository(),
            new UserRepository()
        );

        $data = [
            'name' => 'ignacior',
            'email' => 'ignacior@example.test',
            'password' => 'somepassword2022',
        ];

        $user = call_user_func($service, $data);

        $this->assertEquals($data['name'], $user->name);
        $this->assertEquals($data['email'], $user->email);
        $this->assertNotEmpty($user->password);
        $this->assertNotEmpty($user->person->id);
        $this->assertNotEmpty($user->competitor->id);
    }
}
