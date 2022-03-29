<?php

namespace Tests\Feature\Controllers\User;

use App\Models\Person;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class LoginUserControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function a_login_should_be_successfull_where_credentials_are_ok()
    {
        $data = [
            'email' => 'ignacior@example.test',
            'password' => 'somepassword2022',
        ];

        $person = Person::factory()->create();

        $user = User::factory()->create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'person_id' => $person->id,
        ]);

        $response = $this->post('/api/login', $data);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data')
                ->has('data.token')
                ->has('data.message')
                ->has('data.user')
                ->has('data.user.person')
                ->where('data.user.person.first_name', $person->first_name)
                ->where('data.user.person.last_name', $person->last_name)
                ->where('data.user.name', $user->name)
                ->where('data.user.email', $user->email)
                ->missing('data.user.password')
                ->missing('errors')
        );
    }

    /**
     * @test
     */
    public function a_login_should_be_failed_where_email_or_password_not_equals()
    {
        $data = [
            'email' => 'ignacior@example.test',
            'password' => 'somepassword2022',
        ];

        $person = Person::factory()->create();

        $user = User::factory()->create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'person_id' => $person->id,
        ]);

        $response = $this->post('/api/login', [
            'email' => 'different_email@email.test',
            'password' => 'differenPassword2020',
        ]);

        $response->assertStatus(401);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data')
                ->has('data.message')
                ->missing('data.token')
                ->missing('data.user')
        );
    }
}
