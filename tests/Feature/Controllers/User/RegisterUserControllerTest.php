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
            $json->has('data')
                ->has('data.message')
                ->has('data.user')
                ->has('data.user.person')
                ->where('data.user.person.first_name', $data['first_name'])
                ->where('data.user.person.last_name', $data['last_name'])
                ->where('data.user.name', $data['name'])
                ->where('data.user.email', $data['email'])
                ->missing('data.user.password')
                ->missing('errors')
        );
    }
}
