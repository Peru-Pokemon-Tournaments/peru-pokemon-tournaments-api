<?php

namespace Tests\Feature\Controllers\User;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class RegisterUserControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function a_register_user_should_be_ok()
    {
        $data = [
            'first_name' => 'Ignacio',
            'last_name' => 'Rueda Boada',
            'name' => 'ignacior',
            'email' => 'ignacior@example.test',
            'password' => 'somepassword2022',
        ];

        $response = $this->post('/api/register', $data);

        $response->assertStatus(201);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('message')
                ->has('user')
                ->has('user.person')
                ->where('user.person.first_name', $data['first_name'])
                ->where('user.person.last_name', $data['last_name'])
                ->where('user.name', $data['name'])
                ->where('user.email', $data['email'])
                ->missing('user.password')
                ->missing('errors')
        );
    }
}
