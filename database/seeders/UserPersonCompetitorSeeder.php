<?php

namespace Database\Seeders;

use App\Models\Competitor;
use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserPersonCompetitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $person = Person::factory()->create()->first();

        $user = User::factory()->create([
            'password' => 'somepassword2022',
            'person_id' => $person->id,
        ])->first();

        Competitor::factory()->create([
            'nick_name' => $user->name,
            'user_id' => $user->id,
        ]);
    }
}
